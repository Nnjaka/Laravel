<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UnloadingController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return view('welcome');
})
    ->name('welcome');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/news/{category}', [CategoryNewsController::class, 'index'])
    ->name('news.category');

Route::get('/feedback', [FeedbackController::class, 'index'])
    ->name('feedback');

Route::post('/feedback/store', [FeedbackController::class, 'store'])
    ->name('feedback.store');

Route::get('/unloading', [UnloadingController::class, 'index'])
    ->name('unloading');

Route::post('/unloading', [UnloadingController::class, 'index'])
    ->name('unloading');

Route::post('/unloading/store', [UnloadingController::class, 'store'])
    ->name('unloading.store');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('sources', AdminSourceController::class);
});
