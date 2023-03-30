<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //for showing all the orders
        $user = Auth::user();

        $orders = $user->orders()->orderBy('created_at', 'desc')->paginate(5);

        return view('user.orders.index', ['orders'=>$orders]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();

        $amount = $user->cart->price_sum;

        $cartProducts = $user->cart->cartProducts;

        return view('user.orders.create', ['user'=> $user, 'amount' => $amount, 'cartProducts' => $cartProducts]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $user = Auth::user();

        $amount = $user->cart->price_sum;

        $cartProducts = $user->cart->cartProducts;

        // dd($user);

        $order = Order::create([
            'user_id' => $user->id,
            'status' => "unpaid",
            'address' => $request->address,
            'name' => $request->name,
            'contact' => $request->contact,
            'amount' => $amount,
        ]);

        foreach ($cartProducts as $cartProduct){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartProduct->product_id,
                'quantity' => $cartProduct->quantity,
                'name' => $cartProduct ->product->name,
                'price'=> $cartProduct ->product->price,
                'size' => $cartProduct ->size,
                'color' => $cartProduct -> color,
            ]);
            CartProduct::destroy($cartProduct->id);
        }







        // $stock = $product->stocks->where('color',$color)->where('size',$request->size)->first();

        // $stock -> decrement('quantity', 1);

        return redirect(route('user.orders.show', ['order'=>$order]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //show order details
        $orderProducts = $order->orderProducts()->orderBy('created_at', 'desc')->paginate(5);

        return view('user.orders.show', ['order'=>$order,'orderProducts'=>$orderProducts]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
        return view('user.orders.edit', ['order'=>$order]);

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

        ]);

        //$path = $request->file('image')->store('product','public');

        $order->update([
            'name' => $request->name,
            'contact' => $request->contact ,
            'address' => $request->address,

        ]);

        return redirect(route('user.orders.show', ['order'=>$order]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();

        return redirect(route('user.orders.index'));
    }
}
