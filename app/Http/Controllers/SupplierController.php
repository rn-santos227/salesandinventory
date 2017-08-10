<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Supplier;
use App\Category;
use App\AuditTrail;
use Auth;


class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('search') && Schema::hasColumn('suppliers', $request->input('tags'))) {
            $suppliers = Supplier::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else{
            $suppliers = Supplier::paginate(5);
        }
        //returns suppliers blade and imports suppliers into blade
        return view('suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns suppliers blade
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validates all input 
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:suppliers',
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:suppliers',
            'address' => 'string|max:255',
            'contact' => 'string|max:255',
            'description' => 'string|max:255',
        ]);

        // if ($v->fails()) {
        //     return redirect()->back()->withErrors($v->errors());
        // }
        //stores info into suppliers table
        Supplier::create($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Suppliers',
                            'activity' => 'Created ' . 'Supplier ' . $request->name, 
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
        //checks if Supplier model exists
        $suppliers = Supplier::findOrFail($id);
        //updates the suppliers table
        $suppliers->update($request->all());  
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Suppliers',
                            'activity' => 'Updated ' . 'Supplier ' . $request->name, 
        ]);
        return redirect()->back();
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