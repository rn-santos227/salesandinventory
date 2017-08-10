<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Retailer;
use App\Receipt;
use App\Purchase;
use App\Order;
use Anam\Phpcart\Cart;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cart = new Cart('retailer');
        $carts = $cart->Items();
        return view('retailer.index',  compact('carts'));
    }

    public function search(Request $request) 
    {
        $items = Item::whereActive('1')
        ->where('quantity', '>', 0)
        ->where(function($query) use($request) {
            $query->where('name', 'LIKE', '%'.$request->search.'%')
            ->orwhere('ref_code', 'LIKE', '%'.$request->search.'%');
        })->get();

        return Response::json(['success'=>true,'items'=>$items]);    
    }

    public function updateCart(Request $request)
    {
        $cart = new Cart('retailer');
        $cart->updateQty($request->id,$request->quantity);
        return Response::json(['success'=>true,'response'=>$cart]);   
    }

    public function addToCart(Request $request)
    {
        $cart = new Cart('retailer');
        $cart->add([
            'id'       => $request->id,
            'name'     => $request->name,
            'quantity' => 1,
            'price'    => $request->price
        ]);

        return Response::json(['success'=>true,'data'=>$cart]);       
    }

    public function deleteFromCart(Request $request)
    {
        $cart = new Cart('retailer');
        $cart->remove($request->id);
        return Response::json(['success'=>true,'data'=>$cart]);
 
    }

    public function clearCart()
    {
        $cart = new Cart('retailer');
        $cart->clear();
        return Response::json(['success'=>true,'data'=>$cart]);
    }

    public function total()
    {
        $cart = new Cart('retailer');
        $count = $cart->totalQuantity();
        $total = $cart->getTotal();
        $setting = DB::table('system_settings')->first();;
        return Response::json(['success'=>true,'total'=>$total, 'count'=>$count, 'setting'=>$setting]);
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
            'status' => 'paid',
            'mode' => 'retailer',
        ]);

        $carts = json_decode($request->orders, true);
        foreach($carts as $cart) {
            DB::table('items')
            ->where('id', $cart['id'])
            ->update(['quantity' => DB::table('items')->where('id', $cart['id'])->value('quantity') - $cart['quantity']]);

            Purchase::create([
                'ref_code' => DB::table('items')->where('id', $cart['id'])->value('ref_code'),
                'name' => $cart['name'],
                'cost' => DB::table('items')->where('id', $cart['id'])->value('cost'),
                'qty' => $cart['quantity'],
                'price' => DB::table('items')->where('id', $cart['id'])->value('price'),
                'subtotal' => $cart['subtotal'],
                'receipt_id' => $receipt->id,
                'status' => 'paid',
            ]);

            // Order::create([
            //     'menu_id' => $cart['id'],
            //     'menu' => $cart['name'],
            //     'cost' => DB::table('items')->where('id', $cart['id'])->value('cost'),
            //     'qty' => $cart['quantity'],
            //     'price' => DB::table('items')->where('id', $cart['id'])->value('cost') * $cart['quantity'],
            //     'subtotal' => $cart['subtotal'],
            //     'receipt_id' => $receipt->id,
            //     'status' => 'served'
            // ]);
        }

        return Response::json(['success'=>true, 'carts'=>$carts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function show(Retailer $retailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Retailer $retailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retailer $retailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retailer $retailer)
    {
        //
    }
}
