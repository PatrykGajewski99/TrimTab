<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user.privilege'])->name('dashboard');

require __DIR__.'/auth.php';

Route::patch('/dashboard',[UserController::class,'readXML'])->middleware(['auth', 'user.privilege'])->name('file.upload');

Route::get('/adminDashboard',[AdminController::class,'read'])->middleware(['auth', 'admin.privilege'])->name('show.users');
