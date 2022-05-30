<?php

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



//landingpage
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/tag/{slug?}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
Route::get('/product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about']);

Auth::routes();

//cart
Route::get('cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [App\Http\Controllers\CartController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [App\Http\Controllers\CartController::class, 'remove'])->name('remove_from_cart');
Route::get('/order/checkout', [\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');

//admin
Route::group(['middleware' => ['auth', 'isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::post('categories/images', [\App\Http\Controllers\Admin\CategoryController::class,'storeImage'])->name('categories.storeImage');

    // tags
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);

    // products
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::post('products/images', [\App\Http\Controllers\Admin\ProductController::class,'storeImage'])->name('products.storeImage');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
