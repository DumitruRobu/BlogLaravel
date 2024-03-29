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

Route::group(['namespace' => "App\Http\Controllers\Admin", "prefix"=>"admin", 'middleware'=>['auth','admin', 'verified']], function(){
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

    Route::group(['namespace' => "Tag", "prefix"=>"tags"], function() {
        Route::get('/', 'IndexController')->name("admin.tag.index");
        Route::get('/create', 'CreateController')->name("admin.tag.create");
        Route::post('/', 'StoreController')->name("admin.tag.store");
        Route::get('/{id}', 'ViewTagController')->name("admin.tag.view");
        Route::get('/edit/{id}', 'EditTagController')->name("admin.tag.edit");
        Route::patch('/{tag}', 'UpdateTagController')->name("admin.tag.update");
        Route::delete('/{id}', 'DeleteTagController')->name("admin.tag.delete");
    });

    Route::group(['namespace' => "Post", "prefix"=>"posts"], function() {
        Route::get('/', 'IndexController')->name("admin.post.index");
        Route::get('/create', 'CreateController')->name("admin.post.create");
        Route::post('/', 'StoreController')->name("admin.post.store");
        Route::get('/{id}', 'ViewPostController')->name("admin.post.view");
        Route::get('/edit/{id}', 'EditPostController')->name("admin.post.edit");
        Route::patch('/{post}', 'UpdatePostController')->name("admin.post.update");
        Route::delete('/{id}', 'DeletePostController')->name("admin.post.delete");
    });

    Route::group(['namespace' => "User", "prefix"=>"users"], function() {
        Route::get('/', 'IndexController')->name("admin.user.index");
        Route::get('/create', 'CreateController')->name("admin.user.create");
        Route::post('/', 'StoreController')->name("admin.user.store");
        Route::get('/{id}', 'ViewUserController')->name("admin.user.view");
        Route::get('/edit/{id}', 'EditUserController')->name("admin.user.edit");
        Route::patch('/{user}', 'UpdateUserController')->name("admin.user.update");
        Route::delete('/{id}', 'DeleteUserController')->name("admin.user.delete");
    });
});



Auth::routes(['verify'=>true]);



















