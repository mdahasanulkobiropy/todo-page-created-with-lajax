<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TheamController;
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

Route::get('/', [FrontendController::class, 'index']);

//tag route

Route::post('/addtag', [TagController::class, 'store'])->name('store.tag');

//task route
Route::post('/addtask', [TaskController::class, 'store'])->name('store.task');
Route::post('/taskupdate/{id}', [TaskController::class, 'update'])->name('update.task');
Route::get('/taskdelete/{id}', [TaskController::class, 'delete'])->name('delete.task');
Route::get('/taskforcedelete/{id}', [TaskController::class, 'forcedelete'])->name('forcedelete.task');
Route::get('/taskrestore/{id}', [TaskController::class, 'restore'])->name('restore.task');
Route::get('/taskcomplete/{id}', [TaskController::class, 'complete'])->name('complete.task');
Route::get('/taskincomplete/{id}', [TaskController::class, 'incomplete'])->name('incomplete.task');
Route::get('/taskimportant/{id}', [TaskController::class, 'important'])->name('important.task');
Route::get('/taskunimportant/{id}', [TaskController::class, 'unimportant'])->name('unimportant.task');

// theam Route
Route::get('/theam/{id}', [TheamController::class, 'theam'])->name('theam.task');
Route::get('/theamcolor/{id}', [TheamController::class, 'theamcolor'])->name('theamcolor.task');


