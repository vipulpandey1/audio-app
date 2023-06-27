<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcatController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReadingController;
use App\Http\Controllers\Admin\AdsController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController as FrontEndCategoryController;
use App\Http\Controllers\SubcategoryController as FrontEndSubCategoryController;
use App\Http\Controllers\FrontController as HomeController;

use App\Http\Controllers\SocialController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\FrontSeriesController;
use App\Http\Controllers\AudioPlayController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\MyAccountController;


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

// Route::get('/', function () {
//     return view('fronts.index');
// });
Route::get('/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);


Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('front_end_index');
});
Route::controller(SearchController::class)->group(function(){
    Route::get('/search','index')->name('search');
    Route::get('/searchResult','result')->name('searchResult');
});


Route::controller(FrontEndCategoryController::class)->group(function(){
    Route::get('/category/{id}','index')->name('front_end_category');
});

Route::controller(FrontEndSubCategoryController::class)->group(function(){
    Route::get('/category/child/{id}','index')->name('front_end_subcategory');
});


Route::controller(FrontSeriesController::class)->group(function(){
    Route::get('/audio/{id}/{url}','index')->name('front_end_products');
    Route::post('/getChapterList','getChapter')->name('getChapter');
});



Route::controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login');
    
    Route::post('/login-user','loginUser')->name('loginUser');
    Route::get('/logout','logoutUser')->name('logoutUser');

    Route::get('/front-end/login','loginFrontEnd')->name('loginFrontEnd');
    
    Route::post('/front-end/login-user','loginFrontEndUser')->name('loginFrontEndUser');
    Route::get('/front-end/logout','logoutFrontEndUser')->name('logoutFrontEndUser');
    
     Route::get('user/signup','signup')->name('usersignup');
    Route::post('/user/registerUser','registerUser')->name('registerUser');
    Route::post('/user/forgotPw','forgotPassword')->name('forgot');
    Route::get('/user/password','resetPasswordView')->name('resetpassword');
      Route::post('/user/reset','resetPassword')->name('passwordResetFinal');
    //Route::view('/user/password')->name('resetpassword');
    // Route::view('/user/password', 'fronts.resetPassword')->name('resetpassword');
});

Route::controller(AudioPlayController::class)->group(function(){
    Route::get('/play/{id}','index')->name('front_play_audio');
    Route::post('/play/onpage/','onpage_player')->name('Onpage_play_audio');
});

Route::middleware(['is_user:user'])->group(function(){
    Route::controller(AudioPlayController::class)->group(function(){
       // Route::get('/play/{id}','index')->name('front_play_audio');
       Route::post('/audio-save','saveAudioDuration')->name('saveAudioDuration');
       
       Route::post('/watch-home-status','WatchhomeStatusActive')->name('WatchhomeStatus');
    });

    Route::controller(FrontSeriesController::class)->group(function(){
       Route::post('/reccommendation-save','saveReccommendation')->name('saveRec');
       
       
     });
     
     Route::controller(MyAccountController::class)->group(function(){
       Route::get('/playlist','index')->name('Myplaylist');
       Route::get('/account','myaccount')->name('myaccount');
        Route::get('/like/list','likeList')->name('mylikeList');
       Route::post('/recent-save-list','saveRecent')->name('saveRecentlist');
        Route::post('/like-save-list','saveLike')->name('saveLikelist');
        Route::post('/change-password','changepassword')->name('changePs');
     });
     
});




Route::prefix('admin')->middleware(['is_admin:user'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
    });
      
    Route::controller(AdsController::class)->group(function(){
        Route::get('/ads','index')->name('ads');
        Route::post('/ads-save','addSliderImage')->name('addAdsImage');
        Route::get('/ads-remove/{id}','removeAds')->name('removeAds');
        Route::get('/media-ads','adspopup')->name('mediaAds');
        Route::get('/productmedia','DropdownProductMedia')->name('DropdownProductMedia');
        Route::post('/popup-attach-insert','adspopupMediaInsert')->name('product.popup_attach_insert');
        Route::get('/mediaAds-remove/{id}','AdsMediaRemove')->name('MediaremoveAds');
        Route::get('/GetProductMedia','GetProductMediaEditMode')->name('GetProductMedia');
        Route::get('/ads-edit/{id}','EditAds')->name('EditAds');
        Route::post('/ads-media-save','saveAdsMedia')->name('saveAdsMedia');
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
         Route::post('/subcategory-change-status','changeStatus')->name('changeStatus');

         
         
    });
    Route::controller(ReadingController::class)->group(function(){
        Route::get('/reading','index')->name('reading');
         Route::get('/reading-add','readingAdd')->name('readingAdd');
         Route::post('/reading-save','savereading')->name('savereading');
         Route::get('/reading-edit/{id}','readingEdit')->name('readingEdit');
         Route::get('/reading-remove/{id}','removereading')->name('removereading');
         Route::get('/get-reading-list/{id}','getChapterlist')->name('reading.get-list');
         
         Route::get('/reading-chapter/{id}/{audio?}','readingnewadd')->name('readingchapterAdd');
          
         Route::post('/chapter-save','singleChapterSave')->name('saveSingleChapter');
         Route::get('/delete-chapter/{id}','deleteChapter')->name('del.reading.chapter');

   });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product','index')->name('product');
         Route::get('/product-add','productAdd')->name('productAdd');
         Route::post('/product-save','saveProduct')->name('saveProduct');
         Route::get('/product-edit/{id}','productEdit')->name('productEdit');
         Route::get('/product-remove/{id}','removeProduct')->name('removeProduct');
         Route::get('/get-subcategory-id','getSubCateById')->name('getSubCateById');

         Route::get('/product-audio/{id}/{audio?}','audioIndex')->name('audioIndex');
         Route::post('/audio-save','audioUpload')->name('audioUpload');

        
         

         Route::post('/product-media-create','saveAccountMedia')->name('product.media');
         Route::get('/get-product-media/{id}','getMedias')->name('product.get-media');
         Route::get('/delete-product-media/{id}','deleteMedia')->name('del.product.media');
         Route::post('/save-title','saveTitle')->name('saveTitle');
         Route::get('/download','downloadMp3')->name('downloadMp3');
         Route::post('/product-change-status','changeStatus')->name('product.changeStatus');
         Route::get('/dropzone-media/{id}','dropZoneMedia')->name('dropZoneMedia');
         Route::post('/feature-status-change','FeaturechangeStatus')->name('product.FeaturechangeStatus');
         
         Route::post('/change-popup-status','changePopUpStatus')->name('product.changePopUpStatus');
         Route::post('/pop-up-attach-media','productMediaPopUpAttachment')->name('product.pop_up_attach_media');

         
    });



    Route::controller(SliderController::class)->group(function(){
        Route::get('/slider','index')->name('slider');
        Route::post('/slider-save','addSliderImage')->name('addSliderImage');
        Route::get('/slider-remove/{id}','removeSlider')->name('removeSlider');
    });

        



        
        
        
    
});