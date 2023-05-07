<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use function GuzzleHttp\Promise\task;


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
Route::view('login', 'auth.login')->name('login');
Route::post('authenticate', [AuthController::class, 'login'])->name('authenticate');
Route::middleware(['auth'])->group(function () {
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::view('/', 'main')->name('taskgroup');
Route::view('/group/create', 'taskgroup-create')->name('taskgroup.create');
Route::view('/task/create', 'task.create')->name('task.create');
Route::view('/task/pending', 'task.pending-task')->name('task.pending-task');

});
