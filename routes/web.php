<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Home\HomeController;
// use App\Http\Controllers\Home\SearchController;

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




Route::get('/', [HomeController::class , 'index'])->name('index');
Route::get('/show/{post}', [HomeController::class , 'show'])->name('show');
Route::post('comment/store/{post}', [HomeController::class , 'commentStore'])->name('comment.store');
Route::get('search', [HomeController::class , 'search'])->name('search');





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



//admin

//category


Route::prefix('admin')->name('admin.')->middleware(['auth','verified','IsAdmin'])->group(function(){



    Route::get('/',[ DashboardController::class, 'index'])->name('index');

    ////// category ////

    Route::resource('category' , CategoryController::class);

    ///////POST/////

    Route::resource('post' , PostController::class);
    Route::get('post/postSelected/{post}',[PostController::class, 'postSelected'])->name('post.postSelected');
    Route::get('post/postBreaking/{post}',[PostController::class, 'postBreaking'])->name('post.postBreaking');





    ///////POST/////

    Route::resource('banner' , BannerController::class);


    //////POST/////

    Route::resource('comment' , CommentController::class);
    Route::get('comment/approve/{comment}',[CommentController::class, 'approve'])->name('comment.approve');


    ///////Menu/////

    Route::resource('menu' , MenuController::class);




    ///////USER/////

    Route::resource('user' , UserController::class);
    Route::get('user/setting/{user}',[UserController::class, 'setting'])->name('user.setting');




    ///////webSetting/////

    Route::resource('setting' , SettingController::class);


});












