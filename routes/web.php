<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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


Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('Admin/category',[CategoryController::class,'index']);
    Route::get('Admin/manage_category',[CategoryController::class,'manage_category']);
    Route::get('Admin/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('Admin/manage_category_process',[CategoryController::class,'manage_category_process'])->name('Admin.manage_category_process');
    Route::get('Admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('Admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    Route::get('Admin/coupon',[CouponController::class,'index']);
    Route::get('Admin/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('Admin/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('Admin/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('Admin.manage_coupon_process');
    Route::get('Admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('Admin/coupon/status/{status}/{id}',[CouponController::class,'status']);


    Route::get('Admin/size',[SizeController::class,'index']);
    Route::get('Admin/manage_size',[SizeController::class,'manage_size']);
    Route::get('Admin/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('Admin/manage_size_process',[SizeController::class,'manage_size_process'])->name('Admin.manage_size_process');
    Route::get('Admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('Admin/size/status/{status}/{id}',[SizeController::class,'status']);


    Route::get('Admin/color',[ColorController::class,'index']);
    Route::get('Admin/manage_color',[ColorController::class,'manage_color']);
    Route::get('Admin/manage_color/{id}',[ColorController::class,'manage_color']);
    Route::post('Admin/manage_color_process',[ColorController::class,'manage_color_process'])->name('Admin.manage_color_process');
    Route::get('Admin/color/delete/{id}',[ColorController::class,'delete']);
    Route::get('Admin/color/status/{status}/{id}',[ColorController::class,'status']);

    Route::get('Admin/product',[ProductController::class,'index']);
    Route::get('Admin/manage_product',[ProductController::class,'manage_product']);
    Route::get('Admin/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('Admin/manage_product_process',[ProductController::class,'manage_product_process'])->name('Admin.manage_product_process');
    Route::get('Admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('Admin/product/status/{status}/{id}',[ProductController::class,'status']);



    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Sucessfully');
        return redirect('admin');

    });
});
