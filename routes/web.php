<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\GaragesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers;


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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-dash', [App\Http\Controllers\UserController::class, 'index'])->name('user.dash')->middleware('user');
Route::get('/admin-dash', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dash')->middleware('admin');
Route::get('/garage-dash', [App\Http\Controllers\GarageController::class, 'index'])->name('garage.dash')->middleware('garage');
Route::get('/reviews', [App\Http\Controllers\ReviewsController::class, 'index'])->name('reviews');
Route::get('/garages', [App\Http\Controllers\GaragesController::class, 'showGarages'])->name('garages');
Route::get('/garages', [App\Http\Controllers\GaragesController::class, 'dropGarages'])->name('dropgarages');
Route::get('/review-check', [App\Http\Controllers\ReviewsController::class, 'showReviews'])->name('review-check')->middleware('admin');
Route::get('/review-check', [App\Http\Controllers\ReviewsController::class, 'totalReviews'])->name('review-check')->middleware('admin');
Route::get('changeReviewStatus', [App\Http\Controllers\ReviewsController::class, 'changeReviewStatus'])->name('changeReviewStatus')->middleware('admin');
Route::get('/admin-dash', [App\Http\Controllers\AdminController::class, 'showMeldingen'])->name('admin.dash')->middleware('admin');
Route::get('/pakketten', function () {
    return view('pakketten');
});

Route::get('/add-garage', [App\Http\Controllers\GaragesController::class, 'create'])->name('add-garage')->middleware('admin');
Route::get('changeStatus', [App\Http\Controllers\GaragesController::class, 'changeStatus'])->name('changeStatus')->middleware('admin');
Route::get('/add-garage', [App\Http\Controllers\GaragesController::class, 'viewGarages'])->name('add-garage')->middleware('admin');
Route::post('store-garage', [App\Http\Controllers\GaragesController::class, 'store'])->name('store-garage')->middleware('admin');
