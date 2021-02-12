<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/',  'Frontend|HomeController@index');
Route::group(['namespace' => 'Frontend'],function(){
    Route::get('/', 'HomeController@index')->name('homepage');
    Route::get('subcategory_item/{id}' ,'HomeController@item')->name('sub_category');
    Route::get('item_detail/{id}' , 'HomeController@itemdetails')->name('item_detail');
    Route::get('cart', 'HomeController@cart')->name('cart');
    Route::get('orderhistory', 'HomeController@orderhistory')->name('orderhistory');

    Route::resource('order' , 'OrderController');
    
     });



Route::middleware('role:admin')->group(function () {
    Route::group(['namespace' => 'Backend'],function(){
        Route::get('dashboard', function(){
            return view('backend.dashboard');
        }  )->name('dashboardpage');
        Route::resource('category', 'CategoryController');
        Route::resource('brand' , 'BrandController');
        Route::resource('subcategory', 'SubcategoryController');
        Route::resource('item', 'ItemController');
    
    });
    //
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

