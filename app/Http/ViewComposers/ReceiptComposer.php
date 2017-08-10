<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ReceiptComposer {
	public function create(View $view) {		
      $receipts = DB::table('receipts')->get();

      $view->with('receipts', $receipts);
	}
}