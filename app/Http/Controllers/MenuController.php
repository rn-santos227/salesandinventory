<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use App\Menu;
use Image;
use Carbon;
use DB;
use PDF;
use App\AuditTrail;
use Auth;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $menus = DB::table("menus")->get();
        view()->share('menus',$menus);

        if($request->has('download')){

            $pdf = PDF::loadView('menus.pdf');
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Menu',
                            'activity' => 'Downloaded ' . 'Menu List', 
            ]);
            return $pdf->download('Menus-'.Carbon\Carbon::now().'.pdf');
        }
        return view('menus.pdf');

    }

    public function index(Request $request)
    {
        $menus;
        if($request->input('tag') == 'category') {
            $menus = Menu::where('category_id', DB::table('categories')->where('name', 'LIKE', '%'. $request->input('search') .'%')->value('id'))->paginate(5);
        }
        else if($request->has('search') && Schema::hasColumn('menus', $request->input('tags'))) {
            $menus = Menu::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else{
            $menus = Menu::paginate(5);
        }
        if ($request->ajax()) {
            return view('menus.data', compact('menus'));
        }

        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fname = '';
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:menus',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->input('ref_code') . '.' . $file->getClientOriginalExtension();
            $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
            Image::make($file->getRealPath())->resize(150, 150)->save();
            $fname = $filename;
        }
        
        Menu::create([
            'ref_code' => $request->ref_code,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => !$request->has('image')? $fname : '',
            'cost' => $request->cost,
            'price' => $request->price,
        ]);

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Menu',
                            'activity' => 'Created ' . 'Menu Item ' . $request->name, 
        ]);
        
        return redirect()->back();
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
            'ref_code' => 'required|string|max:255|',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }  else {
            $menus=Menu::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->input('ref_code') . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            } else {
                $fname = $menus->getImageFile();
            }

            $menus->update([
                'ref_code' => $request->ref_code,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $fname,
                'cost' => $request->cost,
                'price' => $request->price,
                'active' => $request->active,
            ]);  

            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Menu',
                            'activity' => 'Updated ' . 'Menu Item ' . $request->name, 
            ]);

            return redirect()->back();
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
