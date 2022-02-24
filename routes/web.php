<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::get('/show_appointments', [AdminController::class, 'show_appointments']);
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);
Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);
Route::get('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);
Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);
Route::get('/showdoctor', [AdminController::class, 'showdoctor']);

Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myappointment', [HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);
