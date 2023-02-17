<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



route::get('/view_catagory',[AdminController::class,'view_catagory']);

route::post('/add_catagory',[AdminController::class,'add_catagory']);

route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);

route::get('/show_product',[AdminController::class,'show_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/delete_user/{id}',[AdminController::class,'delete_user']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

route::get('/order',[AdminController::class,'order']);

route::get('/delivered/{id}',[AdminController::class,'delivered']);

route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

route::get('/user',[AdminController::class,'user']);

route::get('/update_user/{id}',[AdminController::class,'update_user']);

route::post('/update_user_confirm/{id}',[AdminController::class,'update_user_confirm']);

route::get('/filter',[AdminController::class,'filter']);

route::get('/order_delivery',[AdminController::class,'order_delivery']);

route::get('/order_cancle',[AdminController::class,'order_cancle']);

route::get('/search',[AdminController::class,'searchdata']);

route::get('/searchduser',[AdminController::class,'searchduser']);











route::get('/redirect',[HomeController::class,'redirect']);

route::get('/product_details/{id}',[HomeController::class,'product_details']);

route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/cash_order',[HomeController::class,'cash_order']);

route::get('/paid/{totalprice}',[HomeController::class,'paid']);

route::get('/shirt/{id}',[HomeController::class,'shirt']);

route::get('/show_order',[HomeController::class,'show_order']);

route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

route::post('/pay_order',[HomeController::class,'pay_order']);

route::get('/shop',[HomeController::class,'shop']);


