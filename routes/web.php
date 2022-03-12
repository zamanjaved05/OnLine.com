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
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});



Route::middleware('auth')->group(function (){

});




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
Route::get('allcosmetics', [\App\Http\Controllers\CosmeticController::class, 'all']);
Route::get('allProducts1', [\App\Http\Controllers\Product1Controller::class, 'all']);
//





//front


//Route::get('about', function () {
//    return view('content.about');
//});

//Route::get('checkout', function () {
//    return view('content.checkout');
//});
//Route::get('contactUS', function () {
//    return view('content.contact_us');
//});
Route::get('about', [\App\Http\Controllers\ContactController::class,'about']);
Route::get('contactUS', [\App\Http\Controllers\ContactController::class,'contactus']);
Route::post('mail', [\App\Http\Controllers\ContactController::class,'mail'])->name('mail');


//

//cart
Route::get('layout/', [\App\Http\Controllers\CartController::class, 'layout'])->name('layout');
Route::get('/', [\App\Http\Controllers\CartController::class, 'productList'])->name('products.list');
Route::get('cart', [\App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [\App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [\App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');
//
Route::get('checkout', [\App\Http\Controllers\CartController::class, 'checkout']);
Route::post('checkoutstore', [\App\Http\Controllers\CartController::class, 'checkoutstore'])->name('checkoutstore');
//detailPage
Route::get('productDetail/{id}', [\App\Http\Controllers\CartController::class, 'productDetail'])->name('productDetail');
Route::get('cosmetic_detail/{id}', [\App\Http\Controllers\CartController::class, 'cosmetic_detail'])->name('cosmetic_detail');
Route::get('bag_detail/{id}', [\App\Http\Controllers\CartController::class, 'bag_detail'])->name('bag_detail');
Route::get('products1_detail/{id}', [\App\Http\Controllers\CartController::class, 'products1_detail'])->name('products1_detail');
Route::get('shoes_detail/{id}', [\App\Http\Controllers\CartController::class, 'shoes_detail'])->name('shoes_detail');
//Route::get('checkout', [\App\Http\Controllers\CartController::class,'checkout']);



//
Route::get('/stripe', [\App\Http\Controllers\StripeController::class, 'index']);
Route::post('/transaction', [\App\Http\Controllers\StripeController::class, 'makePayment'])->name('make-payment');
//


Route::get('shoes', [\App\Http\Controllers\ShoesController::class, 'index']);
Route::post('/store', [\App\Http\Controllers\ShoesController::class, 'store'])->name('store');
Route::get('/fetchall', [\App\Http\Controllers\ShoesController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete/', [\App\Http\Controllers\ShoesController::class, 'delete'])->name('delete');
Route::get('/edit', [\App\Http\Controllers\ShoesController::class, 'edit'])->name('edit');
Route::post('/update', [\App\Http\Controllers\ShoesController::class, 'update'])->name('update');

//

Route::resource('shirts',\App\Http\Controllers\ShirtController::class);
//Route::get('edit',[\App\Http\Controllers\ShirtController::class,'create']);
//Route::get('product_detail/{id}',[\App\Http\Controllers\ShirtController::class,'show']);
    //Route::get('dell/{id}',[\App\Http\Controllers\ShirtController::class,'destroy'])->name('dell');
Route::get('product_edit/{id}',[\App\Http\Controllers\ShirtController::class,'edit'])->name('product_edit');
Route::post('update_product/{id}',[\App\Http\Controllers\ShirtController::class,'update'])->name('product_update');
