<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('orders.index', ['products' => $products, 'orders' => $orders]);
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
        //return $request->all();
        DB::transaction(function () use ($request) {

            //customer
            $customers = new Customer;
            $customers->name = $request->customer_name;
            $customers->save();
            $order_id = $customers->id;

            //order
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {

                $orders = new Order;
                $orders->order_id = $order_id;
                $orders->product_id = $request->product_id[$product_id];
                $orders->unitprice = $request->price[$product_id];
                $orders->quantity = $request->quantity[$product_id];
                $orders->amount = $request->total_amount[$product_id];
                $orders->save();
            }

            //transaction
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->user_id = auth()->user()->id;
            $transaction->balance = $request->balance;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->payment_method = $request->payment_method;
            $transaction->save();


            $products = Product::all();
            $orders = Order::where('order_id', $order_id)->get();
            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index', [
                'products' => $products,
                'order' => $orders,
                'customer_orders' => $orderedBy
            ]);
        });
        
        return back()->with("Product orders Fails to inserted! Check your inputs!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
