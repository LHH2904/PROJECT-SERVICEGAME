<?php

use App\Http\Controllers\AccessoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideoController;

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

Route::get('/', [IndexController::class, 'home']);
Route::get('/dich-vu', [IndexController::class, 'dichvu'])->name('dichvu'); //tất cả dịch vụ thuộc game
Route::get('/dich-vu/{slug}', [IndexController::class, 'dichvucon'])->name('dichvucon'); //dịch vụ con thuộc dịch vụ
Route::get('/danh-muc-game/{slug}', [IndexController::class, 'danhmuc_game'])->name('danhmucgame'); //tất cả danh mục thuộc game
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [IndexController::class, 'blogs_detail'])->name('blogs_detail');

Route::get('/video-highlight', [IndexController::class, 'video_highlight'])->name('video-highlight');
//show video
Route::post('/show_video', [IndexController::class, 'show_video'])->name('show_video');
// Đăng nhập
// Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Category
Route::resource('/category', CategoryController::class);

// Accessories (phụ kiện)
Route::resource('/accessories', AccessoriesController::class);

// Slider
Route::resource('/slider', SliderController::class);

// Blogs
Route::resource('/blog', BlogController::class);

// Videos
Route::resource('/video', VideoController::class);
