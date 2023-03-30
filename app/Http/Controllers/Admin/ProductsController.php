<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Product::query();

        //For search
        if($request->search){
            $query->where(function ($q) use ($request){
                $q->where('name','like','%'.$request->search.'%');
                $q->orwhere('description','like','%'.$request->search.'%');
                $q->orwhere('price','like','%'.$request->search.'%');
                $q->orwhere('rating','like','%'.$request->search.'%');
            });
        }

        // print $query->toSql();

        $products = $query->orderBy('created_at','desc')->paginate(3);

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();


        return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);


        $user_id = Auth::user()->id;
        //$user_id = 1;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price'=>'required',
            'image' => 'mimes:jpg,bmp,png,jpeg',
            'category' =>'required',
        ]);

        //store file
        $path = $request->file('image')->store('product','public');

        $product = Product::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => 0,
            'image' => $path,
        ]);

        $product->categories()->attach(Category::where('name', $request->category)->first()->id);

        return redirect(route('admin.products.index'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        // $products = Product::findOrFail($id);
        $stocks = Stock::where('product_id',$product->id)->orderBy('created_at','desc')->paginate(3);


        return view('admin.products.show', ['product' => $product,'stocks' => $stocks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('admin.products.edit', ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description'=>'required',
        ]);

        //$path = $request->file('image')->store('product','public');

        $product->update([
            'name' => $request->name,
            'price' => $request->price ,
            'description' => $request->description,
        ]);

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect(route('admin.products.index'));
    }

}
