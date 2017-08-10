<?php

namespace App\Http\Controllers;

use App\Kitchen;
use Illuminate\Http\Request;
use App\SystemSetting;
use App\Order;
use App\Receipt;
use Response;
use DB;

class KitchenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('kitchens.index');
    }

    public function load() {
        
        

        if(SystemSetting::first()->system_mode == 'Retailer')
        {

        }
        else if(SystemSetting::first()->system_mode == 'FastFood')
        {
            $receipt_ids = DB::table('receipts')
            ->where('status', 'paid_and_pending')
            ->pluck('id');

            $orders = DB::table('orders')
            ->where('status', 'pending')
            ->orderBy('receipt_id', 'asc')
            ->get();
        }
        else
        {

        } 
        return Response::json(['success'=>true,'orders'=>$orders, 'receipt_ids'=>$receipt_ids]);  
    }

    public function serve(Request $request) {
        if(SystemSetting::first()->system_mode == 'Retailer')
        {

        }
        else if(SystemSetting::first()->system_mode == 'FastFood')
        {
             DB::table('orders')
                ->where('receipt_id', $request->id)
                ->update([
                'status' => 'paid',
                ]);

            DB::table('receipts')
                ->where('id', $request->id)
                ->update([
                'status' => 'paid',
                ]);
        }
        else
        {

        }
       

        return redirect()->back();  
    }
}
