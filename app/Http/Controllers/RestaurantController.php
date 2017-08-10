<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Restaurant;
use App\Order;
use App\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Anam\Phpcart\Cart;
use Response;
use Auth;

class RestaurantController extends Controller
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
        $v_tables = DB::table('tables')->where('status','vacant')->get();
        $o_tables = DB::table('tables')
        ->where('status','reserved')
        ->orwhere('status','occupied')->get();
        return view('restaurant.index', compact('v_tables', 'o_tables'));
    }


    // public function updateTray(Request $request)
    // {
    //     $cart = new Cart();
    //     $cart->updateQty($request->id,$request->quantity);
    //     return Response::json(['success'=>true,'data'=>$cart]);   
    // }
    
    // public function addToTray(Request $request)
    // {
    //     $cart = new Cart();
    //     $cart->add([
    //         'id'       => $request->id,
    //         'name'     => $request->name,
    //         'quantity' => 1,
    //         'price'    => $request->price
    //     ]);

    //     return Response::json(['success'=>true,'data'=>$cart]);       
    // }

    // public function deleteFromTray(Request $request)
    // {
    //     $cart = new Cart();
    //     $cart->remove($request->id);
    //     return Response::json(['success'=>true,'data'=>$cart]);
 
    // }

    // public function clearTray()
    // {
    //     $cart = new Cart();
    //     $cart->clear();
    //     return Response::json(['success'=>true,'data'=>$cart]);
    // }

    // public function total()
    // {
    //     $cart = new Cart();
    //     $count = $cart->totalQuantity();
    //     $total = $cart->getTotal();
    //     $setting = DB::table('system_settings')->first();;
    //     return Response::json(['success'=>true,'total'=>$total, 'count'=>$count, 'setting'=>$setting]);
    // }

    // public function create()
    // {
        
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */

    public function store(Request $request)
    {
        $receipt = Receipt::create([
            'total' => $request->subtotal,
            'vatable' => $request->vatable,
            'vat' => $request->vat,
            'vatexempt' => $request->vatexempt,
            'vat_sales' => $request->vatsales,
            'count' => $request->count,
            'amount_due' => $request->amountdue,
            'cash' => $request->cash,
            'change_due' => $request->changedue,
            'user_id' => Auth::user()->id,
            'status' => 'pending',
            'mode' => 'restaurant',
        ]);

        DB::table('tables')->where('id', $request->id)->update([
            'status' => 'reserved',
            'receipt_id' => $receipt->id,
        ]);
        return Response::json(['success'=>true, 'receipt'=>$receipt]);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Restaurant  $restaurant
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Restaurant $restaurant)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Restaurant  $restaurant
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Restaurant $restaurant)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Restaurant  $restaurant
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Restaurant $restaurant)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Restaurant  $restaurant
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Restaurant $restaurant)
    // {
    //     //
    // }
}
