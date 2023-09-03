<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController as NewsController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
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

Route::get('/', [Controller::class, 'home'])->name('home');


// show user register form
Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');
// create new users
Route::post('/users', [UserController::class, 'store'])->middleware('guest');
// show user login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// user authenticate 
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// user log-out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// user profile
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');



// show News datas
Route::get('/news', [NewsController::class, 'index']);
// manage news
Route::get('/news/manage', [NewsController::class, 'manage'])->middleware('auth');
// create form
Route::get('/news/create', [NewsController::class, 'create'])->middleware('auth');
// store news data
Route::post('/news', [NewsController::class, 'store'])->middleware('auth');
// edit form
Route::get('/news/{single_news}/edit', [NewsController::class, 'edit'])->middleware('auth');
// update news data
Route::put('/news/{single_news}', [NewsController::class, 'update'])->middleware('auth');
// delete news data
Route::delete('/news/{single_news}', [NewsController::class, 'destroy'])->middleware('auth');
// show single news data
Route::get('/news/{single_news}', [NewsController::class, 'show'])->where('id', '[0-9]+');

// show stories
Route::get('/stories', [StoriesController::class, 'index']);
