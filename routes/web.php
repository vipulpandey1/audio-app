<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcatController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\LoginController;


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
Route::controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login');
    
    Route::post('/login-user','loginUser')->name('loginUser');
    Route::get('/logout','logoutUser')->name('logoutUser');

});


Route::prefix('admin')->middleware(['is_admin:user'])->group(function(){
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

    Route::controller(SubcatController::class)->group(function(){
        Route::get('/subcategory','index')->name('subcategory');
         Route::get('/subcategory-add','addView')->name('addViewsub');
         Route::post('/subcategory-save','savesubCategory')->name('saveCategorysub');
         Route::get('/subcategory-edit/{id}','editView')->name('editViewsub');
         Route::get('/subcategory-remove/{id}','removesubCategory')->name('removesubCategory');

         
    });



    Route::controller(ProductController::class)->group(function(){
        Route::get('/product','index')->name('product');
         Route::get('/product-add','productAdd')->name('productAdd');
         Route::post('/product-save','saveProduct')->name('saveProduct');
         Route::get('/product-edit/{id}','productEdit')->name('productEdit');
         Route::get('/product-remove/{id}','removeProduct')->name('removeProduct');
         Route::get('/get-subcategory-id','getSubCateById')->name('getSubCateById');

    });



    Route::controller(SliderController::class)->group(function(){
        Route::get('/slider','index')->name('slider');
        Route::post('/slider-save','addSliderImage')->name('addSliderImage');
        Route::get('/slider-remove/{id}','removeSlider')->name('removeSlider');
    });

        



        
        
        
    
});