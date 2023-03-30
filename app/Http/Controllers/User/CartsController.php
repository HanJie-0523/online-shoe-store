<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user(1);

        $total = $user->cart->price_sum;


        // $cartProducts = $user->cart->cartProducts()->orderBy('created_at')->paginate(3);

        $cartProducts = $user->cart->cartProducts()->orderBy('created_at')->get();

        // dd(sizeof($cartProducts));

        return view('user.carts.index', ['total' => $total, 'cartProducts' => $cartProducts]);
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
    public function store(Request $request, Product $product, $color)
    {
        //
        // dd($request);
        // dd($product);
        $user = Auth::user();

        // dd($user);
        $cart_id = $user->cart->id;

        CartProduct::create([
            'cart_id' => $cart_id,
            'product_id' => $product->id,
            'quantity' => 1,
            'size' => $request->size,
            'color' => $color,
        ]);

        // $stock = $product->stocks->where('color',$color)->where('size',$request->size)->first();

        // $stock -> decrement('quantity', 1);

        return redirect(route('user.products.show', ['product' => $product]));
    }

    public function postAddCart(Request $request)
    {

        $id = $request->id;
        $color = $request->color;
        $size = $request->size;
        // dd($request);

        $user = Auth::user();

        // dd($user);
        $cart_id = $user->cart->id;

        CartProduct::create([
            'cart_id' => $cart_id,
            'product_id' => $id,
            'quantity' => 1,
            'size' => $size,
            'color' => $color,
        ]);


        if ($size == null) {
            return response()->json(["error" => "Missing size"], 400);
        }

        return response()->json(["id" => $id, "color" => $color, "size" => $size]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartProduct $cart)
    {
        // die("LL");
        $cart->delete();

        return redirect(route('user.carts.index'));
        return response()->json(["success" => "Cart Deleted"]);
    }

    public function deleteCart(Request $request)
    {
        // die("L7L");


        $cart = CartProduct::findOrFail($request->id);

        $cart->delete();

        // return redirect(route('user.carts.index'));

        return response()->json(["id"=>$request->id, "success" => "Cart Deleted"]);
    }
}
