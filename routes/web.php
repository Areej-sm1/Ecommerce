<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Shopping;
use Illuminate\Support\Facades\APP;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::group([
    'prefix'=>'dashboard',
], function(){
    Route::get('/', [Dashboard::class, 'index'])->name('index');
    Route::get('/products', [Dashboard::class, 'getproducts'])->name('products');
    Route::post('/search', [Dashboard::class, 'getproducts'])->name('search');
    Route::get('/productdet', [Dashboard::class, 'productDetails'])->name('productdet');
    Route::post('/createproduct', [Dashboard::class, 'CreateProduct'])->name('createproduct');
    Route::post('/createproductdet', [Dashboard::class, 'CreateProductDetails'])->name('create-det');
    Route::get('/del/{id}', [Dashboard::class, 'del'])->name('del');
    Route::get('/edit/{id}', [Dashboard::class, 'edit'])->name('edit');
    Route::post('/update', [Dashboard::class, 'update'])->name('update');
    Route::post('/createproduct',[Dashboard::class,"CreateProduct"])->name('createproduct');
    Route::post('/dashboard/createproductdet',[Dashboard::class,"CreateProductDetails"])->name('create-det');
    Route::get('/test',[Dashboard::class,"test"])->name('test');
    Route::get('/logout',[Dashboard::class,"logout"])->name('logout');
    Route::get('/delDetails/{id}',[Dashboard::class,"delDetails"])->name('delDetails');
    Route::get('/edit/{id}',[Dashboard::class,"edit"])->name('edit');

});



Route::get('/shopping/showitems',[Shopping::class,"ShowListitemsPhone"])->name('ShowListitemsPhone');
Route::get('/shopping/details/{id}',[Shopping::class,"ShowDetailsPhone"])->name('details');
Route::get('/shopping/addtocart/{id}',[Shopping::class,"AddToCart"])->name('AddToCart');
Route::get('/shopping/getcaf',[Shopping::class,"getCoffee"]);
Route::get('/shopping/cart/{userid}', [Shopping::class, 'cart'])->name('cart');




Auth::routes();


Route::get ('/language/{locale}',function ($locale) {
    App::setLocale($locale);
    session()->put('locale',$locale);
    return redirect()->back();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
