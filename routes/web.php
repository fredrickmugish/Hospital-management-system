<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/redirects', [HomeController::class, 'redirects'])->middleware('auth', 'verified');

Route::get('/viewdoctors', [AdminController::class, 'viewdoctors']);

Route::get('/showdoctors', [AdminController::class, 'showdoctors']);

Route::post('/uploaddoctor', [AdminController::class, 'uploaddoctor']);

Route::get('/updateview/{id}', [AdminController::class, 'updateview']);

Route::post('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);

Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/viewappointment', [AdminController::class, 'viewappointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/deleteappoint/{id}', [HomeController::class, 'deleteappoint']);

Route::get('/approve/{id}', [AdminController::class, 'approve']);

Route::get('/cancel/{id}', [AdminController::class, 'cancel']);

Route::get('/email/{id}', [AdminController::class, 'email']);

Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
