<?php

use App\Http\Controllers\Vendor\Auth\RegisteredUserController;
use App\Http\Controllers\Vendor\Auth\VendorVerificationController;
use App\Http\Controllers\Vendor\DealController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\PaymentController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProfileController;
use App\Http\Controllers\Vendor\ShippingController;
use App\Http\Controllers\Vendor\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('auth.register');
});
Route::post('/verify',[VendorVerificationController::class,'verify'])->name('verify');
Route::middleware(['auth', 'vendor','vendor_verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('vendor.dashboard.dashboard');
    })->name('dashboard');

    Route::get('/subcategory/{subcategory}',[SubcategoryController::class,'show']);
    Route::post('product/description/image',[ProductController::class,'storeDescriptionImage'])->name('product.description.image');
    Route::get('product/removeall',[ProductController::class,'bulkDelete'])->name('product.bulk-delete');
    Route::resource('product', ProductController::class);

    Route::get('product/{product}/add-to-deal',[DealController::class,'createProductDeal'])->name('product-deal.create');
    Route::post('product/{product}/add-to-deal',[DealController::class,'addProductDeal'])->name('product-deal.store');
    Route::get('orders',[OrderController::class,'index'])->name('order.index');

    Route::get('/payments',[PaymentController::class,'index'])->name('payment.index');
    
    Route::get('profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::get('/shippings',[ShippingController::class,'index'])->name('shippings.index');
    Route::get('/shippings/{shipping}/manage',[ShippingController::class,'edit'])->name('shippings.edit');
    Route::put('/shippings/{shipping}/update',[ShippingController::class,'update'])->name('shippings.update');
});
