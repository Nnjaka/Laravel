<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UnloadingController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', AccountController::class)->name('index');
        //logout
        Route::get('logout', function () {
            Auth::logout();
            return redirect()->route('login');
        })->name('logout');
    });


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::get('parser', ParserController::class)->name('parser');
        Route::get('profile', [AdminProfileController::class, 'edit'])
            ->name('editProfile');
        Route::put('profile', [AdminProfileController::class, 'update'])
            ->name('updateProfile');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::resource('users', AdminUserController::class);
    });
});

Auth::routes();
//social routes
Route::group(['middleware' => 'guest'], function () {
    Route::get('auth/{network}/redirect', [SocialController::class, 'index'])
        ->where('network', '\w+')
        ->name('auth.redirect');
    Route::get('auth/{network}/callback', [SocialController::class, 'callback'])
        ->where('network', '\w+')
        ->name('auth.callback');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
