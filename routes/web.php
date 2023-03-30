<?php

use App\Http\Controllers\Admin\OrdersController as AdminOrdersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\StocksController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\GithubLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartsController;
use App\Http\Controllers\User\OrdersController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProductsController as UserProductsController;
use App\Http\Controllers\User\WishlistsController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Rpute for mail
// Route::get('/email', function(){
//     Mail::to('nbazong@gmail.com')->send(new WelcomeMail());
//     return new WelcomeMail();
// });


Route::get('/', [UserProductsController::class, 'index'])->name('welcome');
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::resource('products', UserProductsController::class);
});



Route::group(['prefix' => 'auth'], function () {
    Route::get('/github/redirect', [GithubLoginController::class, 'login'])->name('auth.github');
    Route::get('/github/callback', [GithubLoginController::class, 'loggedin']);
});

// Route::get('/auth/github/redirect', function () {
// return Socialite::driver('github')->redirect();
// });

// Route::get('/auth/github/callback', function () {
//     $user = Socialite::driver('github')->user();

// });
// Route::group(['prefix'=> 'admin','as'=>'admin.'], function(){

//     Route::resource('users', UsersController::class);
//     Route::resource('products', ProductsController::class);

// });
// Route::get('admin/users', function () {
// return view('admin.users.index');

// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::delete("carts/deleteCart", [CartsController::class, 'deleteCart'])->name('carts.deleteCart');

        Route::resource('carts', CartsController::class);
        Route::resource('wishlists', WishlistsController::class);
        Route::resource('orders', OrdersController::class);

        Route::post("carts/add", [CartsController::class, 'postAddCart'])->name('carts.add');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::put('products/{product}', [UserProductsController::class, 'wishlist'])->name('user.products.wishlist');
        Route::post('products/{product}/{color}', [CartsController::class, 'store'])->name('user.carts.store');
        Route::post('products/changeSize', [UserProductsController::class, 'changeSize'])->name('user.products.changeSize');
        Route::put('products/wishlist', [UserProductsController::class, 'addToWishlist'])->name('user.products.addToWishlist');
        // Route::post('orders/{amount}', [OrdersController::class, 'store'])->name('user.orders.store');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::post('/orders/pay/{order}', [PaymentController::class, 'createPayment'])->name('orders.createPayment');
        Route::get('/orders/pay/callback/{order}', [PaymentController::class, 'paymentCallback'])->name('orders.paymentCallback');
        Route::get('/orders/pay/success', [PaymentController::class, 'paymentSuccess'])->name('orders.success');
        Route::get('/orders/pay/failed', [PaymentController::class, 'paymentFailed'])->name('orders.failed');
    });


    // Route::group(['prefix'=> 'admin','as'=>'admin.'], function(){
    //     Route::resource('users', UsersController::class);
    //     Route::resource('products', ProductsController::class);
    // });

    Route::middleware('admin')->group(function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/', [ProductsController::class, 'index'])->name('admin.products.index');
            Route::resource('users', UsersController::class);
            Route::resource('products', ProductsController::class);
            Route::resource('products.stocks', StocksController::class);
            Route::resource('orders', AdminOrdersController::class);
        });
    });
});

require __DIR__ . '/auth.php';
