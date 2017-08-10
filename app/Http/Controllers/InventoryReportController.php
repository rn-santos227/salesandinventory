<?php

namespace App\Http\Controllers;

use App\InventoryReport;
use Illuminate\Http\Request;
use App\Item;
use Carbon;

class InventoryReportController extends Controller
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
    public function index()
    {
        $items = Item::all();

        $itemTotalCost = 0;
        $itemTotalValue = 0;

        foreach ($items as $item)
        {
            
            $itemTotalCost += $item->quantity * $item->cost;
            $itemTotalValue += $item->quantity * $item->price;
            
        }
        $itemTotalCost = number_format($itemTotalCost, 2, '.', ',');
        $itemTotalValue = number_format($itemTotalValue, 2, '.', ',');
        $mytime = Carbon\Carbon::now();
        $mytimec= date('Y-m-d');
        return view('inventoryreport.index',compact('mytime', 'items','itemTotalCost','itemTotalValue'));
    }
    public function pdfview(Request $request)
    {
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryReport $inventoryReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryReport $inventoryReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryReport $inventoryReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryReport $inventoryReport)
    {
        //
    }
}
