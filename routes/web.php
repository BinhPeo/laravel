<?php

use App\Http\Controllers\admin\SanphamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\DanhmucController;
use App\Http\Controllers\admin\VoucherController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MomoPay;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vnpay;
use Illuminate\Support\Facades\Route;
// index
Route::get('/',[HomeController::class,'index'])->name('index');
// sản phẩm chi tiết
Route::get('/sp/{id}',[HomeController::class,'chitiet'])->name('sp');
// comment vs rating
Route::post('/comments/{product}',[HomeController::class,'comments'])->name('comments');
// giỏ hàng
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::post('/cart/{product}',[CartController::class,'addcart']);
Route::get('/cart/{product}',[CartController::class,'addcart'])->name('addcart');
Route::get('/update/{product}',[CartController::class,'updatecart'])->name('updatecart');
Route::delete('/cart/{product}', [CartController::class, 'deletecart'])->name('deletecart');
//voucher
Route::post('/check_voucher', [CartController::class, 'check_voucher'])->name('check_voucher');
Route::post('/cancel_voucher', [CartController::class, 'cancel_voucher'])->name('cancel_voucher');
// all sản phẩm
Route::get('shop',[HomeController::class,'shop'])->name('shop');
//thanh-toán
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::post('/checkout',[HomeController::class,'checkoutpost']);
// cổng thanh toán 
Route::post('/vnpay',[Vnpay::class,'vnpay']);
Route::post('/momopay',[MomoPay::class,'momopay']);
// sản phẩm yêu thích
Route::get('/like',[LikeController::class,'like'])->name('like');
Route::post('/like/{product}',[LikeController::class,'addlike']);
Route::get('/like/{product}',[LikeController::class,'addlike'])->name('addlike');
Route::delete('/like/{product}', [LikeController::class, 'deletelike'])->name('deletelike');

//mail
Route::get('gmail',[HomeController::class,'gmail']);
// form đăng nhập
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'postlogin']);
// form đăng kí
Route::post('/signup',[UserController::class,'postsignup']);
Route::get('/signup',[UserController::class,'signup'])->name('sigup');
// đăng xuất
Route::get('/logout',[UserController::class,'logout'])->name('logout');
// admin
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminHomeController::class,'dashboard'])->name('home');
    Route::resource('/san-pham',SanphamController::class);
    Route::resource('/danh-muc',DanhmucController::class);
    Route::resource('/voucher',VoucherController::class);
}); 