<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Discount;
use App\AuditTrail;
use Auth;
class DiscountController extends Controller
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
    public function index(Request $request)
    {
        // search discounts
        if($request->has('search')) {
            $discounts = Discount::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else {
            $discounts = Discount::paginate(5);
        }
        return view('discounts.index',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:discounts',
            'name' => 'required|string|max:255',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        Discount::create($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Discounts',
                            'activity' => 'Created ' . 'Discount ' . $request->name, 
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
        $discounts = Discount::findOrFail($id);
        $discounts->update($request->all());  
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Discounts',
                            'activity' => 'Updated ' . 'Discount ' . $request->name, 
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
