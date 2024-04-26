<?php

use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'index'])->name('pages.home');;
Route::get('/question1', [PagesController::class, 'question1'])->name('pages.question1');;
Route::get('/question2', [PagesController::class, 'question2'])->name('pages.question2');;
Route::post('/question2', [PagesController::class, 'getQuestion2'])->name('pages.question2.post');;
Route::get('/question3', [PagesController::class, 'question3'])->name('pages.question3');;
Route::post('/question3', [PagesController::class, 'storeQuestion3'])->name('pages.question3.post');;
