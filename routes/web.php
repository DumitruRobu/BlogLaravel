<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['namespace' => "App\Http\Controllers\Main"], function(){
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => "App\Http\Controllers\Admin", "prefix"=>"admin"], function(){
    Route::group(['namespace' => "Main"], function() {
        Route::get('/', 'IndexController');
    });

    Route::group(['namespace' => "Category", "prefix"=>"categories"], function() {
        Route::get('/', 'IndexController')->name("admin.category.index");
        Route::get('/create', 'CreateController')->name("admin.category.create");
        Route::post('/', 'StoreController')->name("admin.category.store");
        Route::get('/{id}', 'ViewCategoryController')->name("admin.category.view");
        Route::get('/edit/{id}', 'EditCategoryController')->name("admin.category.edit");
        Route::patch('/{category}', 'UpdateCategoryController')->name("admin.category.update");
        Route::delete('/{id}', 'DeleteCategoryController')->name("admin.category.delete");
    });
});



Auth::routes();
