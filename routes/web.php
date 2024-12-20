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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/registration', [UserController::class, 'index']);
Route::post('/contact', [UserController::class, 'submitForm'])->name('contact.submit');
Route::get('/questions', [QuestionsController::class, 'index'])->name('questions.show');
Route::post('/submit-answers', [QuestionsController::class, 'submitAnswers']);
Route::get('/personality_test/reports/{id}', [QuestionsController::class, 'reports']);
Route::get('/reports/know_more', [QuestionsController::class, 'know_more']);
Route::get('complete/order', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'submitForm'])->name('order.submit');

