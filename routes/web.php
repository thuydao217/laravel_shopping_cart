<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
Route::get('/redirect',[HomeController::class,'redirect']) -> middleware('auth','verified');

Route::get('/view_catagory',[AdminHomeController::class,'view_catagory']);
Route::post('/add_catagory',[AdminHomeController::class,'add_catagory']);
Route::get('/delete_catagory/{id}',[AdminHomeController::class,'delete_catagory']);
Route::get('/view_product',[AdminHomeController::class,'view_product']);
Route::post('/add_product',[AdminHomeController::class,'add_product']);
Route::get('/show_product',[AdminHomeController::class,'show_product']);
Route::get('/delete_product/{id}',[AdminHomeController::class,'delete_product']);
Route::get('/update_product/{id}',[AdminHomeController::class,'update_product']);
Route::post('/update_product_confirm/{id}',[AdminHomeController::class,'update_product_confirm']);
Route::get('/order',[AdminHomeController::class,'order']);
Route::get('/delivered/{id}',[AdminHomeController::class,'delivered']);
Route::get('/print_pdf/{id}',[AdminHomeController::class,'print_pdf']);
Route::get('/send_email/{id}',[AdminHomeController::class,'send_email']);
Route::post('/send_user_email/{id}',[AdminHomeController::class,'send_user_email']);
Route::get('/search',[AdminHomeController::class,'searchdata']);

Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::get('/cash_order',[HomeController::class,'cash_order']);
Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/show_order',[HomeController::class,'show_order']);
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
Route::post('/add_comment',[HomeController::class,'add_comment']);
Route::post('/add_comment',[HomeController::class,'add_comment']);
Route::get('product_search',[HomeController::class,'product_search']);
Route::get('view_product_search',[HomeController::class,'view_product_search']);
Route::get('products',[HomeController::class,'products']);
