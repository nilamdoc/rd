<?php

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
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/posts', [PostController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/registration', [HomeController::class, 'registration']);
Route::post('/contact', [HomeController::class, 'submitForm'])->name('contact.submit');
Route::get('/questions', [HomeController::class, 'showQuestions'])->name('questions.show');
