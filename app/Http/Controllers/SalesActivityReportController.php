<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use App\Company;
use DB;
use PDF;
use Carbon\Carbon;

class SalesActivityReportController extends Controller
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
        $receipts = DB::table('receipts')
            ->whereDate('created_at','=', $currentdate)
            ->where('status','=', 'paid')
            ->orderBy('created_at','asc')
            ->get();
        session()->put('period', 'Daily');
        return view('salesreports.salesactivities.index',compact('receipts','currentdate'));
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
    public function pdfview(Request $request)
    {
        $period = $request->session()->get('period', 'default');

        if($period == 'Daily'){
                $datefrom = Carbon::now()->startOfDay();
                $dateto = Carbon::now()->endOfDay();
            }
        elseif ($period == 'Weekly') {
            $datefrom = Carbon::now()->startOfWeek();
            $dateto = Carbon::now()->endOfWeek();
        }
        elseif ($period == 'Monthly') {
            $datefrom = Carbon::now()->startOfMonth();
            $dateto = Carbon::now()->endOfMonth();
        }
        elseif ($period == 'Yearly'){
            $datefrom = Carbon::now()->startOfYear();
            $dateto = Carbon::now()->endOfYear();   
        }
        else
        {
            $datefrom = Carbon::now()->startOfDay();
            $dateto = Carbon::now()->endOfDay();
        }

         $receipts = DB::table('receipts')
            // ->join('orders', 'receipts.receipt_id', '=', 'orders.receipt_id')
            ->whereDate('created_at','>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->where('status','=', 'paid')
            ->orderBy('created_at','asc')
            ->get();

        view()->share('receipts', $receipts);
        view()->share('datefrom', $datefrom);
        view()->share('dateto', $dateto);
        view()->share('period', $period);
        view()->share('company', Company::all()->first()->name);


        if($request->has('download')){
            $pdf = PDF::loadView('salesreports.salesactivities.pdf');
            return $pdf->download('salesactivities-'.Carbon::now().'.pdf');
        }

        return view('salesreports.salesactivities.pdf');
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

        $receipts = DB::table('receipts')
            // ->join('orders', 'receipts.receipt_id', '=', 'orders.receipt_id')
            ->whereDate('created_at','>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->where('status','=', 'paid')
            ->orderBy('created_at','asc')
            ->get();

        $request->session()->put('period', $request->period);

        return view('salesreports.salesactivities.index',compact('receipts'));
        // return $request->dateto;
    }
}
