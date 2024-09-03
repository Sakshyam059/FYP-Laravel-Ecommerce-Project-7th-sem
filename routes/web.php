<?php

use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('homepage');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/contact-us',[PageController::class,'contact'])->name('contact-us');

Route::middleware('guest')->group(function(){

    Route::get('/customer/register', function () {
        return view('auth.customer-register');
    })->name('customer.register');
    Route::get('/customer/login', function () {
        return view('auth.customer-login');
    })->name('customer.login');
});

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::get('/product/category/{slug}',[ProductController::class,'categoryFilter'])->name('product.category-filter');


Route::middleware('auth')->group(function () {
    Route::get('/profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/info', [ProfileController::class, 'info'])->name('profile.info');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/shopping-cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/product/add-to-cart',[CartController::class,'addToCart'])->name('cart.add');
    Route::delete('/product/remove-from-cart/{item}',[CartController::class,'removeFromCart'])->name('cart.remove');

    Route::get('/checkout/billing-information', [CheckoutController::class, 'index'])->name('checkout.billing');
    Route::get('/checkout/payment-details', [CheckoutController::class, 'paymentIndex'])->name('checkout.payment');
    Route::get('/checkout/complete-order', [CheckoutController::class, 'completeOrder'])->name('checkout.complete');

});

require __DIR__.'/auth.php';
