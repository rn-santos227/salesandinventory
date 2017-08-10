<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Item;
use App\Inventory;
use Response;
use Image;
use App\AuditTrail;
use Auth;
use PDF;
use Carbon;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function pdfview(Request $request)
    {
        $items = DB::table("items")->get();
        view()->share('items',$items);

        if($request->has('download')){

            $pdf = PDF::loadView('items.pdf');
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Items',
                            'activity' => 'Downloaded ' . 'Item List', 
            ]);
            return $pdf->download('Items-'.Carbon\Carbon::now().'.pdf');
        }
        return view('items.pdf');

    }
    public function index(Request $request)
    {
        $items = Item::orderBy('created_at', 'DESC')->paginate(5);
        if ($request->ajax()) {
            return view('items.data', compact('items'));
        }
        return view('items.index', compact('items'));
    }

    public function search(Request $request)
    {
        $items;
        if($request->tags == 'category') {
            $items = Item::orderBy('created_at', 'DESC')->where('category_id', DB::table('categories')->where('name', 'LIKE', '%'. $request->search .'%')->value('id'))->paginate(5);
        }
        else if($request->tags == 'supplier') {
            $items = Item::orderBy('created_at', 'DESC')->where('supplier_id', DB::table('suppliers')->where('name', 'LIKE', '%'. $request->search .'%')->value('id'))->paginate(5);
        }
        else if($request->has('search') && Schema::hasColumn('items', $request->tags)) {
            $items = Item::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->paginate(5);
        }
        else{
            $items = Item::orderBy('created_at', 'DESC')->paginate(5);
        }

        if ($request->ajax()) {
            return Response::json(['success'=>true,'items'=>$items]);   
        }
        return Response::json(['success'=>true,'items'=>$items]);   
    }

    public function view(Request $request) 
    {
        $items = Item::findOrFail($request->id);
        $category = $items->category->name;
        $supplier = $items->supplier->name;
        $profit = $items->price - $items->cost; 
        return Response::json(['success'=>true,'item'=>$items,'category'=>$category,'supplier'=>$supplier, 'profit'=> $profit]);  
    }

    public function store(Request $request)
    {
        $fname = '';
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:items|unique:menus',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($v->fails()) {
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->ref_code . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            }
            
            $item = Item::create([
                'ref_code' => $request->ref_code,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'description' => $request->description,
                'image' => $fname,
                'quantity' => $request->quantity,
                'cost' => $request->cost,
                'price' => $request->price,
            ]);

            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Items',
                            'activity' => 'Updated ' . 'Item ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'item'=>$item]);   
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fname = '';
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($v->fails()) {
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }  else {
            $items=Item::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->ref_code . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            } else {
                $fname = $items->getImageFile();
            }

            $items->update([
                'ref_code' => $request->ref_code,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'description' => $request->description,
                'image' => $fname,
                'quantity' => $request->quantity,
                'cost' => $request->cost,
                'price' => $request->price,
                'active' => $request->active,
            ]); 
             
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Items',
                            'activity' => 'Updated ' . 'Item ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'item'=>$items]);  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
