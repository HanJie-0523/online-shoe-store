<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        //
        return view('admin.products.stocks.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        //
        //$user_id = 1;
        $request->validate([
            'color' => 'required',
            'size' => 'required',
            'quantity'=>'required',
        ]);

        Stock::create([
            'color' => $request->color,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'product_id' => $product->id,
        ]);

        return redirect(route('admin.products.show', ['product' => $product]));

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
    public function edit(Product $product, Stock $stock)
    {
        //
        return view('admin.products.stocks.edit', ['product'=>$product,'stock' => $stock]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, Stock $stock)
    {
        //
        $request->validate([
            'color' => 'required',
            'size' => 'required',
            'quantity'=>'required',
        ]);



        $stock->update($request->all());


        return redirect(route('admin.products.show', ['product' => $product]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Stock $stock)
    {
        //
        $stock->delete();

        return redirect(route('admin.products.show', ['product' => $product]));
    }
}
