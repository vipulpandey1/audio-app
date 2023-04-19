<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category','index')->name('category');
        Route::get('/category-add','addView')->name('addView');
        Route::post('/category-save','saveCategory')->name('saveCategory');
        Route::get('/category-edit/{id}','editView')->name('editView');
        Route::get('/category-remove/{id}','removeCategory')->name('removeCategory');
    });

    Route::controller(SliderController::class)->group(function(){
        Route::get('/slider','index')->name('slider');
        Route::post('/slider-save','addSliderImage')->name('addSliderImage');
        Route::get('/slider-remove/{id}','removeSlider')->name('removeSlider');

        
    });



        
        
        
    
});