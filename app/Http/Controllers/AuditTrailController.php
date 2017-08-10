<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditTrail;
use Carbon\Carbon;
use DB;
use PDF;
use App\Receipt;
use App\Company;

class AuditTrailController extends Controller
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
        $audittrails = DB::table('audit_trails')
            ->whereDate('created_at','=', $currentdate)
            ->orderBy('created_at','dsc')
            ->get();
        session()->put('period', 'Daily');
        return view('audittrail.index',compact('audittrails','audittrails'));
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
                $datefrom = Carbon::parse($request->datefrom);
                $dateto = Carbon::parse($request->dateto);
            }

        $audittrails = DB::table('audit_trails')
            ->whereDate('created_at','>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->orderBy('created_at','dsc')
            ->get();


        view()->share('audittrails', $audittrails);
        view()->share('datefrom', $datefrom);
        view()->share('dateto', $dateto);
        view()->share('period', $period);
        view()->share('company', Company::all()->first()->name);

        if($request->has('download')){
            $pdf = PDF::loadView('audittrail.pdf');
            return $pdf->download('audit-trails'.Carbon::now().'.pdf');
        }

        return view('audittrail.pdf');
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

        $audittrails = DB::table('audit_trails')
            ->whereDate('created_at','>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->orderBy('created_at','dsc')
            ->get();

        $request->session()->put('period', $request->period);

        return view('audittrail.index',compact('audittrails'));
        // return $request->dateto;
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
