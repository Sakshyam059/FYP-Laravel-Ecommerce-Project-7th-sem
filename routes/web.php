<?php

use App\Http\Controllers\Checkout\BillingController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Checkout\PaymentController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Checkout\ShippingController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductReviewController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\TransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('homepage');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/contact-us',[PageController::class,'contact'])->name('contact-us');
Route::get('/privacy-policy',[PageController::class,'privacyPolicy'])->name('privacy-policy');

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::get('/product/category/{slug}',[ProductController::class,'categoryFilter'])->name('product.category-filter');

Route::get('/items', [SearchController::class, 'index'])->name('items.index');
Route::get('/items/search', [SearchController::class, 'search'])->name('items.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/info', [ProfileController::class, 'info'])->name('profile.info');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/shopping-cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/product/add-to-cart',[CartController::class,'addToCart'])->name('cart.add');
    Route::delete('/product/remove-from-cart/{item}',[CartController::class,'removeFromCart'])->name('cart.remove');

    Route::post('shipping-details',[ShippingController::class,'createShipping'])->name('shipping.create');

    Route::post('billing-information',[BillingController::class,'create'])->name('billing.create');
    Route::get('/checkout/billing-information', [BillingController::class, 'index'])->name('checkout.billing');
    
    Route::get('/checkout/payment-details', [PaymentController::class, 'index'])->name('checkout.payment');
    Route::post('/payment/initiate',[PaymentController::class,'initiatePayment'])->name('payment.initiate');
    Route::get('/payment/verify',[PaymentController::class,'verifyKhaltiPayment'])->name('payment.verify');
    
    Route::get('/my-orders',[OrderController::class,'index'])->name('order.index');
    Route::get('/my-transactions',[TransactionController::class,'index'])->name('transaction.index');


    Route::get('/checkout/complete-order', [CheckoutController::class, 'completeOrder'])->name('checkout.complete');

    Route::post('/{product}/review',[ProductReviewController::class,'store'])->name('review.store');

});

require __DIR__.'/auth.php';
