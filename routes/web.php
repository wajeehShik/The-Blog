<?php

use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\ContactusController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\PostsController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\TeamController;
use App\Http\Controllers\TestController;
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

Route::get("/test",[TestController::class,'index']);

Route::get('/', [IndexController::class,'index'])->name('home');
Route::group([ 'as' => 'front.'], function () {

Route::get("post/{slug}",[PostsController::class,'show'])->name('post.show');
Route::get("category/{slug}",[PostsController::class,'category'])->name('category.show');
Route::post("post/comment",[PostsController::class,'add_comment'])->name('post.comment');
Route::post("search",[SearchController::class,'index'])->name('search');
Route::get('/faqs',[FaqController::class,'index'])->name('faqs');
Route::get('/contact-us',[ContactusController::class,'index'])->name('contactus');
Route::post('/contact-us',[ContactusController::class,'store'])->name('contactus');
Route::get('/about-us',[AboutUsController::class,'index'])->name('aboutus');
Route::get('/team',[TeamController::class,'index'])->name('team');
});
require __DIR__ . '/auth.php';
