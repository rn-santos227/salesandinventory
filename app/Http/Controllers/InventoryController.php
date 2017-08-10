<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use DB;
use Response;

class InventoryController extends Controller
{
    public function index()
    {
        $products = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->select('items.ref_code as refCode','items.name as itemName','categories.name as categoryName')
            ->orderBy('items.created_at','dsc')
            ->get();

        $inventories = DB::table('inventory')
            ->orderBy('id')
            ->get();
            
        return view('inventory.index', compact('products', 'inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $items = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->where('items.ref_code', 'like', $request->ref_code.'%')
            ->select('items.ref_code as refCode','items.name as itemName','categories.name as categoryName')
            ->orderBy('items.created_at','dsc')
            ->get();
  
        return Response::json(['success'=>true,'items'=>$items]);  
    }

    public function view(Request $request)
    {
        $items = DB::table('items')
            ->where('ref_code', '=', $request->ref_code)
            ->get();
        return Response::json(['success'=>true,'items'=>$items]);
    }

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
    public function addtoinventory(Request $request)
    {
        DB::table('inventory')->insert([
            'name' => $request->name, 
            'ref_code' => $request->ref_code,
            'quantity' => $request->qty,
            'cost' => $request->cost,
            'price' => $request->price,
            'reorder_point' => $request->reorder_point
            ]
        );
        return Response::json(['success'=>true]);
    }

    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
