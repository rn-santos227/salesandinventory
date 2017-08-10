<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SystemSetting;
use App\Receipt;
use Carbon\Carbon;

class SalesAnalysisReportController extends Controller
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

        $currentdate = Carbon::today();
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            $qty = DB::raw('SUM(purchases.qty) as qty');
            $total_cost = DB::raw('SUM(purchases.qty)*purchases.cost as total_cost');
            $gross_rev = DB::raw('(purchases.price*(SUM(purchases.qty))) as gross_rev');
            $profit = DB::raw('((purchases.price*(SUM(purchases.qty))) - (SUM(purchases.qty)*purchases.cost)) as profit');
            $percent = DB::raw('((((purchases.price*(SUM(purchases.qty)))- SUM(purchases.qty)*purchases.cost)/(purchases.price*(SUM(purchases.qty))))*100)as percent ');

            $salesanalysis =  DB::table('purchases')
                ->whereDate('purchases.created_at','=', $currentdate)
                ->where('purchases.status', 'paid')
                ->select('purchases.ref_code', $qty,'purchases.cost', $total_cost,'purchases.price', $gross_rev, $profit, $percent)
                ->groupBy('purchases.ref_code')
                ->orderBy('purchases.qty', 'dsc')
                ->get(); 
        }   
        else
        {
            $qty = DB::raw('SUM(orders.qty) as qty');
            $total_cost = DB::raw('SUM(orders.qty)*orders.cost as total_cost');
            $gross_rev = DB::raw('(orders.price*(SUM(orders.qty))) as gross_rev');
            $profit = DB::raw('((orders.price*(SUM(orders.qty))) - (SUM(orders.qty)*orders.cost)) as profit');
            $percent = DB::raw('((((orders.price*(SUM(orders.qty)))- SUM(orders.qty)*orders.cost)/(orders.price*(SUM(orders.qty))))*100)as percent ');

            $salesanalysis =  DB::table('orders')
                ->whereDate('orders.created_at','=', $currentdate)
                ->where('orders.status', 'paid')
                ->select('orders.ref_code', $qty,'orders.cost', $total_cost,'orders.price', $gross_rev, $profit, $percent)
                ->groupBy('orders.ref_code')
                ->orderBy('orders.qty', 'dsc')
                ->get();    
        }

            $total_cost = 0;
            $total_gross_rev = 0;
            $total_profit = 0;
            
            foreach ($salesanalysis as $item) 
            {
                $total_cost += $item->total_cost;
                $total_gross_rev += $item->gross_rev;
                $total_profit += $item->profit;
            }
            return view('salesreports.salesanalysis.index',compact('salesanalysis','total_cost','total_gross_rev','total_profit'));

            // $qty = DB::raw('SUM(orders.qty) as qty');
            // $total_cost = DB::raw('SUM(orders.qty)*orders.cost as total_cost');
            // $gross_rev = DB::raw('(menus.price*(SUM(orders.qty))) as gross_rev');
            // $profit = DB::raw('((menus.price*(SUM(orders.qty))) - (SUM(orders.qty)*orders.cost)) as profit');
            // $percent = DB::raw('((((menus.price*(SUM(orders.qty)))- SUM(orders.qty)*orders.cost)/(menus.price*(SUM(orders.qty))))*100)as percent ');
            // $currentdate = Carbon::today();
            
            // $salesanalysis =  DB::table('orders')
            //     ->join('menus', 'orders.menu_id', '=', 'menus.id')
            //     ->whereDate('orders.created_at','=', $currentdate)
            //     ->where('orders.status', 'served')
            //     ->select('orders.menu_id', $qty,'orders.cost', $total_cost,'menus.price', $gross_rev, $profit, $percent)
            //     ->groupBy('orders.menu_id')
            //     ->orderBy('orders.qty', 'dsc')
            // ->get();

        // $order_ref_codes = DB::table('orders')->pluck('ref_code');
        // $purchase_ref_codes = DB::table('purchases')->pluck('ref_code');

        // $orders = Receipt::SalesAnalysis('orders', $order_ref_codes);
        // $purchases = Receipt::SalesAnalysis('purchases', $purchase_ref_codes);

        // $transactions = array_merge($orders, $purchases);

        // $total_cost = 0;
        // $total_gross_rev = 0;
        // $total_profit = 0;

        // foreach($transactions as $key => $value) {
        //     $total_cost += $value['total_cost'];
        //     $total_gross_rev += $value['gross_rev'];
        //     $total_profit += $value['profit'];
        // }

        // return view('salesreports.salesanalysis.index',compact('transactions','total_cost','total_gross_rev','total_profit'));        
    }

    public function search(Request $request)
    {
            if($request->period == 'Daily'){
                $datefrom = Carbon::now()->startOfDay();
                $dateto = Carbon::now()->endOfDay();
            }
            elseif ($request->period == 'Weekly') {
                $datefrom = Carbon::now()->startOfWeek();
                $dateto = Carbon::now()->endOfWeek();
            }
            elseif ($request->period == 'Monthly') {
                $datefrom = Carbon::now()->startOfMonth();
                $dateto = Carbon::now()->endOfMonth();
            }
            elseif ($request->period == 'Yearly'){
                $datefrom = Carbon::now()->startOfYear();
                $dateto = Carbon::now()->endOfYear();   
            }
            else
            {
                $datefrom = Carbon::parse($request->datefrom);
                $dateto = Carbon::parse($request->dateto);
            }


            if(SystemSetting::first()->system_mode == 'Retailer')
            {
                $qty = DB::raw('SUM(purchases.qty) as qty');
                $total_cost = DB::raw('SUM(purchases.qty)*purchases.cost as total_cost');
                $gross_rev = DB::raw('(purchases.price*(SUM(purchases.qty))) as gross_rev');
                $profit = DB::raw('((purchases.price*(SUM(purchases.qty))) - (SUM(purchases.qty)*purchases.cost)) as profit');
                $percent = DB::raw('((((purchases.price*(SUM(purchases.qty)))- SUM(purchases.qty)*purchases.cost)/(purchases.price*(SUM(purchases.qty))))*100)as percent ');

                $salesanalysis =  DB::table('purchases')
                    ->whereDate('created_at','>=', $datefrom)
                    ->whereDate('created_at', '<=', $dateto)
                    ->where('purchases.status', 'paid')
                    ->select('purchases.ref_code', $qty,'purchases.cost', $total_cost,'purchases.price', $gross_rev, $profit, $percent)
                    ->groupBy('purchases.ref_code')
                    ->orderBy('purchases.qty', 'dsc')
                    ->get(); 
            }   
            else
            {
                $qty = DB::raw('SUM(orders.qty) as qty');
                $total_cost = DB::raw('SUM(orders.qty)*orders.cost as total_cost');
                $gross_rev = DB::raw('(orders.price*(SUM(orders.qty))) as gross_rev');
                $profit = DB::raw('((orders.price*(SUM(orders.qty))) - (SUM(orders.qty)*orders.cost)) as profit');
                $percent = DB::raw('((((orders.price*(SUM(orders.qty)))- SUM(orders.qty)*orders.cost)/(orders.price*(SUM(orders.qty))))*100)as percent ');

                $salesanalysis =  DB::table('orders')
                    ->whereDate('created_at','>=', $datefrom)
                    ->whereDate('created_at', '<=', $dateto)
                    ->where('orders.status', 'paid')
                    ->select('orders.ref_code', $qty,'orders.cost', $total_cost,'orders.price', $gross_rev, $profit, $percent)
                    ->groupBy('orders.ref_code')
                    ->orderBy('orders.qty', 'dsc')
                    ->get();    
            }

                $total_cost = 0;
                $total_gross_rev = 0;
                $total_profit = 0;
                
                foreach ($salesanalysis as $item) 
                {
                    $total_cost += $item->total_cost;
                    $total_gross_rev += $item->gross_rev;
                    $total_profit += $item->profit;
                }
                return view('salesreports.salesanalysis.index',compact('salesanalysis','total_cost','total_gross_rev','total_profit'));



            //return $datefrom;

        //      $order_ref_codes = DB::table('orders')
        //          ->whereDate('created_at','>=', $datefrom)
        //          ->whereDate('created_at', '<=', $dateto)
        //          ->pluck('ref_code');

        //      $orders = Receipt::SalesAnalysis('orders', $order_ref_codes);

        // //     // return view('salesreports.salesanalysis.index',compact('orders'));      

        //  $order_ref_codes = DB::table('orders')
        //                      ->whereDate('created_at','>=', $datefrom)
        //                      ->whereDate('created_at', '<=', $dateto)
        //                      ->pluck('ref_code');

        //  $purchase_ref_codes = DB::table('purchases')
        //                     ->whereDate('created_at','>=', $datefrom)
        //                     ->whereDate('created_at', '<=', $dateto)
        //                     ->pluck('ref_code');

        //  $orders = Receipt::SalesAnalysis('orders', $order_ref_codes);
        //  $purchases = Receipt::SalesAnalysis('purchases', $purchase_ref_codes);

        //  $transactions = array_merge($orders, $purchases);

        //  $total_cost = 0;
        //  $total_gross_rev = 0;
        //  $total_profit = 0;

        //  foreach($transactions as $key => $value) {
        //      $total_cost += $value['total_cost'];
        //      $total_gross_rev += $value['gross_rev'];
        //      $total_profit += $value['profit'];
        //  }

        //  return view('salesreports.salesanalysis.index',compact('transactions','total_cost','total_gross_rev','total_profit'));  
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
