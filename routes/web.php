<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

Route::view('auth', 'auth')->middleware('guest:user')->name('auth');
Route::view('check', 'check');

Route::get('/', 'HomeController')->name('/');
Route::get('/sections/{section}/products', 'HomeSectionProductController')->name('home-sections.products');
Route::get('/shop', 'ProductController@index')->name('products.index');
Route::get('/products/{product:slug}', 'ProductController@show')->name('products.show');
Route::get('/categories/{category:slug}/products', 'CategoryProductController')->name('categories.products');
Route::get('/brands/{brand:slug}/products', 'BrandProductController')->name('brands.products');

Route::view('/cart', 'cart')->name('cart');
Route::match(['get', 'post'], '/checkout', 'CheckoutController')->name('checkout');
Route::get('track-order', 'OrderTrackController')->name('track-order');

pageRoutes();

Route::get('/storage-link', function() {
    Artisan::call('storage:link');
});

Route::get('/scout-flush', function () {
    Artisan::call('scout:flush', ["model" => "App\Product"]);
});

Route::get('/scout-import', function () {
    Artisan::call('scout:import', ["model" => "App\Product"]);
});

Route::get('/do-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize');
    return "Config & Views are Cached";
})->name('do.cache');

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');
    return "Cache is Cleared";
})->name('clear.cache');
