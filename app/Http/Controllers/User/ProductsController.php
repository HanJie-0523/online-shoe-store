<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use App\Models\User;
use App\Http\Controllers\Controller;
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
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }


        // print $query->toSql();
        // foreach ($query as $product){
        //     if($product->stocks_count() > 0){

        //     }
        // }
        // $category_id = Category::where('name', $request->input('category'))->first()->id;
        // dd(Category::find($category_id)->products);
        // dd(Category::where('name', $request->input('category'))->get());
        // dd(Product::find('1')->categories->first()->name);


        $temp = null;


        if ($request->category) {

            $category_id = Category::where('name', $request->input('category'))->first()->id;

            $temp = Category::find($category_id)->products()->orderBy('created_at')->get();
        } else {
            $temp = $query->orderBy('created_at')->get();
        }


        $products = $temp->where('quantity_sum', '>', 0);
        // $temp = $query->orderBy('created_at')->get();


        // $products = $temp->where('quantity_sum', '>', 0);
        // $products = $query->orderBy('created_at')->paginate(9);


        // dd($query->first()->stocks_count);

        // return view('admin.products.index', ['products' => $products]);



        // $products = Product::orderBy('created_at')->get();
        // dd($products);

        return view('welcome', ['products' => $products]);
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
    public function show(Product $product, Request $request)
    {


        //get distinct columns - show all color
        $stocks = Stock::where('product_id', $product->id)->distinct()->get('color');

        //get default selected color
        $color = $stocks->first()->color;


        //get default selected color sizes
        $sizes = Stock::where('product_id', $product->id)->where('color', $color)->get('size');

        //get cliked color and color sizes
        if ($request->color) {
            $sizes = Stock::where('product_id', $product->id)->where('color', $request->color)->get('size');
            $color = $request->color;
        }

        // dd($sizes);

        return view('user.products.show', ['product' => $product, 'stocks' => $stocks, 'sizes' => $sizes, 'color' => $color]);
    }

    public function changeSize(Request $request)
    {
        // dd($request);
        $color = $request->color;

        $product_id = $request->id;

        $sizes = Stock::where('product_id', $product_id)->where('color', $color)->get('size');

        return response()->json(["sizes" => $sizes, "color" => $color]);
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
    public function destroy(string $id)
    {
        //
    }

    public function wishlist(Request $request, Product $product)
    {
        //
        $user_id = Auth::user()->id;
        $product_id = $product->id;
        $user = User::find($user_id);

        // $user -> wishlistProducts() -> create([
        //     'user_id' => $user_id,
        //     'product_id' => $product_id,
        // ]);
        $wishlist = $request->wishlist;
        // $user -> wishlistProducts() -> attach($product_id);

        if ($wishlist && boolval($wishlist) === true) {
            $user->wishlistProducts()->attach($product_id);
        } else {
            $user->wishlistProducts()->detach($product_id);
        }

        return redirect(route('user.products.show', ['product' => $product]));
    }

    public function addTOWishlist(Request $request)
    {

        // $user_id = Auth::user()->id;
        // $user = User::find($user_id);

        // $wishlist = $request->wishlist;
        // // $user -> wishlistProducts() -> attach($product_id);

        // if ($wishlist && boolval($wishlist) === true) {
        //     $user->wishlistProducts()->attach($request->id);
        // } else {
        //     $user->wishlistProducts()->detach($request->id);
        // }


        return response()->json(["id" => $request->id, "x" => "Good"]);
    }
}
