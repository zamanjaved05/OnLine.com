<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('panel', function () {
    return view('admin.adminpanel');
});
Route::get('dashboard1', function () {
    return view('admin.dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('home',[\App\Http\Controllers\HomeController::class,'index']);


Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('contacts', \App\Http\Controllers\ContactController::class);
//
Route::resource('cosmatics', \App\Http\Controllers\CosmeticController::class);
Route::resource('products1', \App\Http\Controllers\Product1Controller::class);
Route::resource('bags', \App\Http\Controllers\BagController::class);


//allProducts
Route::get('allProducts', [\App\Http\Controllers\ProductController::class, 'all']);
Route::get('allCosmatics', [\App\Http\Controllers\CosmeticController::class, 'all']);
Route::get('allProducts1', [\App\Http\Controllers\Product1Controller::class, 'all']);
//





//front
//Route::get('layout/{id}', function ($id) {
//    $detail = Product::find($id);
//    return view('layout.layout',compact('detail')->name('layout'));
//});

Route::get('about', function () {
    return view('content.about');
});

//Route::get('checkout', function () {
//    return view('content.checkout');
//});
Route::get('contactUS', function () {
    return view('content.contact_us');
});



//cart
Route::get('layout', [\App\Http\Controllers\CartController::class, 'layout'])->name('layout');
Route::get('/', [\App\Http\Controllers\CartController::class, 'productList'])->name('products.list');
Route::get('cart', [\App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [\App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [\App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('checkout', [\App\Http\Controllers\CartController::class, 'checkout']);
Route::post('checkoutstore', [\App\Http\Controllers\CartController::class, 'checkoutstore'])->name('checkoutstore');
//detailPage
Route::get('productDetail/{id}', [\App\Http\Controllers\CartController::class, 'productDetail'])->name('productDetail');
//Route::get('checkout', [\App\Http\Controllers\CartController::class,'checkout']);



//
Route::get('/stripe', [\App\Http\Controllers\StripeController::class, 'index']);
Route::post('/transaction', [\App\Http\Controllers\StripeController::class, 'makePayment'])->name('make-payment');
