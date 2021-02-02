<?php

use App\Http\Controllers\Todo;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ElearningController;

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
// Route::resource('/elearning', 'ElearningController');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/showless', [Todo::class, 'index']);
Route::post('/upload', [Todo::class, 'uploadFile']);
Route::get('/show', [FirstController::class, 'index']);
Route::get('/elearning', [ElearningController::class, 'index'])->name('elearning.index');
Route::get('/elearning/create', [ElearningController::class, 'create'])->name('elearning.create');;
Route::post('/elearning/create', [ElearningController::class, 'store'])->name('elearning.store');;
Route::get('/elearning/{id}/edit', [ElearningController::class, 'edit'])->name('elearning.edit');;
Route::patch('/elearning/{id}/update', [ElearningController::class, 'update'])->name('elearning.update');
Route::delete('/elearning/{id}/delete', [ElearningController::class, 'delete'])->name('id.delete');
Route::put('/elearning/{id}/connected', [ElearningController::class, 'connected'])->name('id.connected');
Route::patch('/elearning/{id}/disconnected', [ElearningController::class, 'disconnected'])->name('id.disconnected');
Route::post('/elearning/disconnectedall', [ElearningController::class, 'disconnectedAllSelected'])->name('elearning.dc_all');
Route::post('/elearning/connectedall', [ElearningController::class, 'connectedAllSelected'])->name('elearning.c_all');
Route::post('/elearning/delteall', [ElearningController::class, 'deleteAllSelected'])->name('elearning.del_all');
Route::post('/elearning/modifall', [ElearningController::class, 'modifAllSelected'])->name('elearning.m_all');
Route::post('/elearning/update_all', [ElearningController::class, 'updateAllSelected'])->name('elearning.update_all');
Route::post('/elearning/next', [ElearningController::class, 'next'])->name('elearning.next');
Route::post('/elearning/prev', [ElearningController::class, 'prev'])->name('elearning.prev');












