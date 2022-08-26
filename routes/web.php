<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SmaController;
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
});
//Route::resource('/post', PostController::class);
//POST

Route::get('/post/index', [PostController::class,'index'])->name('post.index');
Route::get('/post/create', [PostController::class,'create'])->name('post.create');
Route::post('/post/store', [PostController::class,'store'])->name('post.store');
Route::get('/post/edit', [PostController::class,'edit'])->name('post.edit');
Route::put('/post/update/{id}', [PostController::class,'update'])->name('post.update');
Route::delete('/post/delete/{id}', [PostController::class,'destroy'])->name('post.delete');

Route::get('/sma/create', [SmaController::class,'create'])->name('sma.create');
Route::post('/sma/store', [SmaController::class,'store'])->name('sma.store');
Route::get('/sma/index', [SmaController::class,'index'])->name('sma.index');
Route::get('{id}/sma/change', [SmaController::class,'change'])->name('sma.change');

Route::get('/dashboard', [PostController::class,'indexlogo'])->name('pr.dashboard');
Route::get('/homepage', [SmaController::class,'indexlogo'])->name('pr.dashboard');
Route::get('/sekolah', [SmaController::class,'edit'])->name('sk.edit');
Route::get('/list', [SmaController::class,'index'])->name('sk.index');
Route::put('/update/{id}', [SmaController::class,'update'])->name('sk.update');
Route::delete('/delete/{id}', [SmaController::class,'destroy'])->name('sk.delete');



