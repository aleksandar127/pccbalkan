<?php

use App\Http\Controllers\ObukeController;
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

Route::get('/', [ObukeController::class, 'index']);
Route::get('/obuke', [ObukeController::class, 'index'])->name('lista');
Route::post('/obuke', [ObukeController::class, 'store'])->name('store');
Route::get('/obuke/{id}/edit', [ObukeController::class, 'edit'])->name('edit');
Route::delete('/obuke/{id}', [ObukeController::class, 'delete'])->name('delete');
Route::put('/obuke/{id}', [ObukeController::class, 'update'])->name('update');
Route::get('/obuke/ajax', [ObukeController::class, 'ajax'])->name('ajax');
