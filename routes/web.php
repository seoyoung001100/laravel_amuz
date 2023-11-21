<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\pagesController;
use \App\Http\Controllers\postcontroller;

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

Route::get('/', [postcontroller::class, 'list' ])->name('list'); //이름 붙이기
Route::get('/create', [postcontroller::class, 'create' ])->name('create'); //이름 붙이기
Route::post('/upload', [postcontroller::class, 'upload' ])->name('upload'); 
Route::get('contents/{content}',[postController::class, 'show'])->name("show");
Route::get('contents/edit/{content}',[postController::class, 'edit'])->name("edit");
Route::post('contents/edit/{content}',[postController::class, 'update'])->name("update");
Route::delete('contents/{content}', [postController::class, 'destroy']) -> name('delete');

Route::get('/account', [postcontroller::class, 'account' ])->name('account'); //이름 붙이기

// Route::get('/test', function () {
//     return view('test');
// })->name("index.test"); //이름 붙이기

// Route::get('/mysqlTest', function () {
//     return view('mysqlTest');
// });
// Route::get('/views', [postcontroller::class, 'list']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
