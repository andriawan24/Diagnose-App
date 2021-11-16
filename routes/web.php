<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SymptomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

Route::prefix('admin')->middleware('auth:sanctum')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    // Symptom
    Route::get('/gejala', [SymptomController::class, 'index'])->name('symptom.index');
    Route::get('/gejala/tambah', [SymptomController::class, 'add'])->name('symptom.add');
    Route::post('/gejala/tambah', [SymptomController::class, 'store'])->name('symptom.store');
    Route::delete('/gejala/hapus/{id}', [SymptomController::class, 'delete'])->name('symptom.delete');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');