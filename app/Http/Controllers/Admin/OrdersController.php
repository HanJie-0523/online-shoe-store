<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::orderBy('created_at','desc')->paginate(10);

        return view('admin.orders.index', ['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //

        $orderProducts = $order->orderProducts;

        return view('admin.orders.show', ['order'=>$order, 'orderProducts'=>$orderProducts]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
        return view('admin.orders.edit', ['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'address'=>'required',
            // 'status'=>'required',
        ]);

        //$path = $request->file('image')->store('product','public');

        $order->update([
            'name' => $request->name,
            'contact' => $request->contact ,
            'address' => $request->address,
            // 'status' => $request->status,
        ]);

        return redirect(route('admin.orders.show',['orders'=>$order]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();

        return redirect(route('admin.orders.index'));
    }
}
