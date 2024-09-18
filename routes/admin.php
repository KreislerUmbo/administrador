<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\DestinoController;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('admin.dashboard');
})->name('dashboard');

Route::get('/options', [OptionController::class, 'index'])->name('options.index');

Route::resource('families', FamilyController::class);
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('countries', CountryController::class);
Route::resource('cities', CityController::class);
Route::resource('destinos', DestinoController::class);
Route::get('products/{product}/variants/{variant}', [ProductController::class, 'variants'])
	->name('products.variants')
	->scopeBindings(); // para verificar que haya relacion entre prodct y variant

Route::put('product/{product}/variants/{variant}', [ProductController::class, 'variantsUpdate'])
	->name('products.variantsUpdate')
	->scopeBindings();

Route::resource('covers', CoverController::class);

Route::get('orders',[OrderController::class,'index'])->name('orders.index');