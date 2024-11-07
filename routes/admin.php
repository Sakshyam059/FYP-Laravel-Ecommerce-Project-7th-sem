<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SitesettingController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\VendorPaymentController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    })->name('dashboard');
    Route::get('vendors',[VendorController::class,'index'])->name('vendor.index');
    Route::get('vendor/requests',[VendorController::class,'verificationRequest'])->name('vendor.request');
    Route::get('vendor/{id}/verify',[VendorController::class,'show'])->name('vendor.show');
    Route::put('vendor/{user}/verify', [VendorController::class, 'verifyVendor'])->name('vendor.verify');

    Route::get('{vendor}/vendor/payment', [VendorPaymentController::class, 'index'])->name('vendor.pay');
    Route::post('{vendor}/vendor/payment', [VendorPaymentController::class, 'pay'])->name('vendor.pay.amount');
    Route::get('{vendor}/vendor/payment/verify', [VendorPaymentController::class, 'verify'])->name('vendor.pay.verify');


    Route::post('product/description/image',[ProductController::class,'storeDescriptionImage'])->name('product.description.image');
    Route::get('product/removeall',[ProductController::class,'bulkDelete'])->name('product.bulk-delete');
    Route::resource('product', ProductController::class);
    
    Route::name('product.')->group(function(){
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubcategoryController::class);   
        Route::resource('color', ColorController::class);   
        Route::resource('size', SizeController::class);   
        Route::resource('brand', BrandController::class);   
        
    });
    Route::name('promotion.')->group(function(){
        Route::resource('banner', BannerController::class);
        Route::resource('deals', DealController::class);   
    });
    Route::resource('newsletter', NewsletterController::class);

    Route::get('orders',[OrderController::class,'index'])->name('order.index');
    Route::get('payments',[PaymentController::class,'index'])->name('payment.index');
    
    Route::get('profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::get('site/setting', [SitesettingController::class, 'edit'])->name('site_setting.edit');
    Route::put('site/setting/{siteSetting}/update', [SitesettingController::class, 'update'])->name('site_setting.update');
    Route::post('site/description', [SiteSettingController::class, 'upload'])->name('site_setting.description');
});
