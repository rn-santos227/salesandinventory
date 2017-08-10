<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditTrail;
use App\Order;
use App\SystemSetting;
use Carbon\Carbon;
use DB;
use PDF;
use Auth;

class GrossProfitReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Raw MySQL Queries for Sales
        $total_sales = DB::raw('SUM(receipts.total) as totalSales');
        $year_receipt_created = DB::raw('YEAR(receipts.created_at) as year');

        //Raw MyQSL Queries for Cost of Goods Sold
        $total_cost = DB::raw('(SUM(qty * cost)) as totalCost');
        $year_sold = DB::raw('YEAR(created_at) as year');

        //Gross Profit for Retailer
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            $sales = DB::table('receipts')
                ->where('status', 'served')
                ->where('mode', 'retailer')
                ->select($total_sales, $year_receipt_created)
                ->groupBy('year')
                ->get();

            $costs = DB::table('purchases')
                ->where('status', 'served')
                ->select($total_cost, $year_sold)
                ->groupBy('year')
                ->get();

            $gross_profit = 0;

            foreach ($sales as $sale) 
            {
                $gross_profit += $sale->totalSales;
            }

            foreach ($costs as $cost) 
            {
                $gross_profit -= $cost->totalCost;
            }
        }

        //Gross Profit for Restaurant
        else
        {
            $sales = DB::table('receipts')
                ->where('status', 'served')
                ->where('mode', 'restaurant')
                ->select($total_sales, $year_receipt_created)
                ->groupBy('year')
                ->get();

            $costs = DB::table('orders')
                ->where('status', 'served')
                ->select($total_cost, $year_sold)
                ->groupBy('year')
                ->get();

            $gross_profit = 0;

            foreach ($sales as $sale) 
            {
                $gross_profit += $sale->totalSales;
            }

            foreach ($costs as $cost) 
            {
                $gross_profit -= $cost->totalCost;
            }
        }

        return view('salesreports.grossprofits.index', compact('gross_profit', 'sales', 'costs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
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
