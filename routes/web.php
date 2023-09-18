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

Route::get('/create', function () {
    return view('create');
})->name("index.create");
Route::get('/', [postcontroller::class, 'list' ])->name('list'); //이름 붙이기
Route::post('/upload', [postcontroller::class, 'upload' ])->name('upload'); 

// Route::get('/test', function () {
//     return view('test');
// })->name("index.test"); //이름 붙이기

// Route::get('/mysqlTest', function () {
//     return view('mysqlTest');
// });
// Route::get('/views', [postcontroller::class, 'list']);