<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Carbon\Carbon;

class ReportComposer {
	public function create(View $view) {
		$currentdate = Carbon::today();

        // gets total sales for today
        $totalsales = DB::table('receipts')
            ->whereDate('created_at','=', $currentdate)
            ->where('status','=', 'served')
            ->orderBy('created_at','asc')
            ->select(DB::raw('SUM(amount_due) as sales'))
            ->first();

        // gets transactions for today
        $transactions = DB::table('receipts')
            ->whereDate('created_at','=', $currentdate)
            ->where('status','=', 'served')
            ->orderBy('created_at','asc')
            ->select(DB::raw('count(ID) as trans'))
            ->first();
        
        //gets all orders for today
        $solditems =  DB::table('orders')
            ->where('status', 'served')
            ->select('orders.*', DB::raw('SUM(subtotal) as subtotal'), DB::raw('SUM(qty) as qty'))
            ->whereDate('created_at','=', $currentdate)
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->orderBy('subtotal', 'dsc')
            ->limit(3)
            ->get();

        //gets all items
        $products = DB::table('items')
            ->orderBy('quantity', 'asc')
            ->limit(3)
            ->get();

         
        $view->with('currentdate', $currentdate);
        $view->with('totalsales', $totalsales);
        $view->with('transactions', $transactions);
        $view->with('solditems', $solditems);
        $view->with('products', $products);
	}
}