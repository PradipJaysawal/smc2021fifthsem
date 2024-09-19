<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\pagescontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');
Route::get('/viewpackage/{id}',[pagescontroller::class,'viewpackage'])->name('viewpackage');

Route::middleware(['auth'])->group(function(){
Route::get('/bookpackage/{id}',[pagescontroller::class,'bookpackage'])->name('bookpackage');

Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/addtocart',[CartController::class,'store'])->name('addtocart');
Route::get('/cart/{id}/destroy',[CartController::class,'destroy'])->name('cart.destroy');
Route::get('/checkout/{cartid}',[CartController::class,'checkout'])->name('checkout');

Route::get('/order/{cartid}/{totalprice}',[orderController::class,'store'])->name('order.store');


});

//carts...................................................................................


Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'isadmin'])->name('dashboard');

Route::middleware(['auth', 'isadmin'])->group(function () {

    //category..............................................................
    route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
    route::get('/category/{id}/destory',[CategoryController::class,'destory'])->name('category.destory');

    //notice................................................................
    route::get('/notice',[NoticeController::class,'index'])->name('notice.index');
    route::get('/notice/create',[NoticeController::class,'create'])->name('notice.create');
    route::post('/notice/store',[NoticeController::class,'store'])->name('notice.store');
    route::get('/notice/{id}/edit',[NoticeController::class,'edit'])->name('notice.edit');
    route::post('/notice/{id}/update',[NoticeController::class,'update'])->name('notice.update');
    route::get('/notice/{id}/destroy',[NoticeController::class,'destroy'])->name('notice.destroy');


    //items...............................................................................
    route::get('/items',[ItemController::class,'index'])->name('items.index');
    route::get('/items/create',[ItemController::class,'create'])->name('items.create');
    route::post('/items/store',[ItemController::class,'store'])->name('items.store');
    route::get('/items/{id}/edit',[ItemController::class,'edit'])->name('items.edit');
    route::post('/items/{id}/update',[ItemController::class,'update'])->name('items.update');
    route::get('/items/{id}/destroy',[ItemController::class,'destroy'])->name('items.destroy');



    //package................................................................................
    route::get('/packages',[PackageController::class,'index'])->name('packages.index');
    route::get('/packages/create',[PackageController::class,'create'])->name('packages.create');
    route::post('/packages/store',[PackageController::class,'store'])->name('packages.store');
    route::get('/packages/{id}/edit',[PackageController::class,'edit'])->name('packages.edit');
    route::post('/packages/{id}/update',[PackageController::class,'update'])->name('packages.update');
    route::get('/packages/{id}/destroy',[PackageController::class,'destroy'])->name('packages.destroy');



    //banner..........................................................................................
    Route::get('/banners',[BannerController::class,'index'])->name('banners.index');
    Route::get('/banners/create',[BannerController::class,'create'])->name('banners.create');
    Route::post('/banners/store',[BannerController::class,'store'])->name('banners.store');
    Route::get('/banners/{id}/edit',[BannerController::class,'edit'])->name('banners.edit');
    Route::post('/banners/{id}/update',[BannerController::class,'update'])->name('banners.update');
    Route::get('/banners/{id}/destroy',[BannerController::class,'destroy'])->name('banners.destroy');

    //orders................................................................................................................
    Route::get('/orders',[orderController::class,'index'])->name('orders.index');
    Route::post('/orders/store',[orderController::class,'store'])->name('orders.store');
    Route::get('/orders/{id}/{status}',[orderController::class,'status'])->name('orders.status');
    Route::get('/orders/{id}/destroy',[orderController::class,'destroy'])->name('orders.destroy');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
