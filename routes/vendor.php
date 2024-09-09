<?php

use App\Http\Controllers\Vendor\Auth\RegisteredUserController;
use App\Http\Controllers\Vendor\Auth\VendorVerificationController;
use App\Http\Controllers\Vendor\BrandController;
use App\Http\Controllers\Vendor\CategoryController;
use App\Http\Controllers\Vendor\ColorController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProfileController;
use App\Http\Controllers\Vendor\SizeController;
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

    Route::get('orders',[OrderController::class,'index'])->name('order.index');
    
    Route::get('profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    
});
