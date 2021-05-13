<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [LoginController::class, 'gotoLoginPage'])->name('login.page');
Route::post('/login/user', [LoginController::class, 'login'])->name('login.user');
Route::get('/register', [RegistrationController::class, 'gotoRegisterPage'])->name('register.page');
Route::post('/signup', [RegistrationController::class, 'RegisterUser'])->name('register.user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/all/book', [BookController::class, 'viewAllBooks'])->name('show.all.books');
Route::get('/all/order', [BookController::class, 'viewAllOrders'])->name('show.all.orders');
Route::get('/all/request', [BookController::class, 'viewAllRequests'])->name('show.all.requests');
Route::get('/all/recommendation', [BookController::class, 'viewAllRecommends'])->name('show.all.recommend');
Route::get('/add/{book}/cart', [BookController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/delete/{book_taken}/cart', [BookController::class, 'deleteFromCart'])->name('delete.from.cart');
Route::patch('/delete/{book}/book', [BookController::class, 'deleteBook'])->name('delete.book');
Route::patch('/delete/{rec}/recommend', [BookController::class, 'deleteRec'])->name('delete.recommend');
Route::patch('/accept/{book_taken}/req', [BookController::class, 'acceptRequest'])->name('accept.request');
Route::get('/add/book', [BookController::class, 'gotoBookAddPage'])->name('add.book.page');
Route::post('/add/book', [BookController::class, 'addBook'])->name('add.book');
Route::post('/recommend/book', [BookController::class, 'recommendBook'])->name('recommend.book');

//
//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');
//
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//
//    return redirect('/home');
//})->middleware(['auth', 'signed'])->name('verification.verify');
//
//Route::post('/email/verification-notification', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//
//    return back()->with('message', 'Verification link sent!');
//})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Route::get('/profile', function () {
//    // Only verified users may access this route...
//})->middleware('verified');
