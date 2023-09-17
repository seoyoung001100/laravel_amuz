<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\pagesController;
use Illuminate\Support\Facades\postController;

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

Route::get('/', function () {
    return view('list');
});
Route::get('/create', function () {
    return view('create');
})->name("index.create"); //이름 붙이기

// Route::get('/test', function () {
//     return view('test');
// })->name("index.test"); //이름 붙이기

// Route::get('/mysqlTest', function () {
//     return view('mysqlTest');
// });
// Route::get('/views', [postcontroller::class, 'list']);