<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\AuditTrail;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //For search function
        if($request->has('search') && Schema::hasColumn('categories', $request->input('tags'))) {
            $categories = Category::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else{
            $categories = Category::paginate(5);
        }

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'ref_code' => 'required|string|max:255|unique:categories',
            'name' => 'required|string|max:255',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        
        Category::create($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Category',
                            'activity' => 'Created ' . 'Category ' . $request->name, 
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
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255',
            'name' => 'required|string|max:255'
        ]);

        $categories = Category::findOrFail($id);
        $categories->update($request->all());  

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Category',
                            'activity' => 'Updated ' . 'Category ' . $request->name, 
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
