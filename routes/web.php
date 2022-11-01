<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
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
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('Admin/manage_category',[CategoryController::class,'manage_category']);
    Route::post('Admin/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.insert');
    Route::get('Admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('Admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    Route::get('Admin/coupon',[CouponController::class,'index']);
    Route::get('Admin/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('Admin/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('Admin/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('Admin.manage_coupon_process');
    Route::get('Admin/coupon/delete/{id}',[CouponController::class,'delete']);



    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Sucessfully');
        return redirect('admin');

    });
});