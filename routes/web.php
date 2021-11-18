<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiseaseController;
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
    Route::get('/gejala/edit/{id}', [SymptomController::class, 'edit'])->name('symptom.edit');
    Route::put('/gejala/edit/{id}', [SymptomController::class, 'update'])->name('symptom.update');
    Route::delete('/gejala/hapus/{id}', [SymptomController::class, 'delete'])->name('symptom.delete');

    // Disease
    Route::get('/gangguan', [DiseaseController::class, 'index'])->name('disease.index');
    Route::get('/gangguan/{id}', [DiseaseController::class, 'show'])->name('disease.show');
    Route::get('/gangguan/tambah', [DiseaseController::class, 'add'])->name('disease.add');
    Route::post('/gangguan/tambah', [DiseaseController::class, 'store'])->name('disease.store');
    Route::get('/gangguan/edit/{id}', [DiseaseController::class, 'edit'])->name('disease.edit');
    Route::put('/gangguan/edit/{id}', [DiseaseController::class, 'update'])->name('disease.update');
    Route::delete('/gangguan/hapus/{id}', [DiseaseController::class, 'delete'])->name('disease.delete');
    Route::put('/gangguan/edit/gejala/{id}', [DiseaseController::class, 'updateSymptoms'])->name('disease.update.symptoms');
    Route::get('/gangguan/{id}/tambah/gejala', [DiseaseController::class, 'addSymptoms'])->name('disease.add.symptoms');
    Route::post('/gangguan/{id}/tambah/gejala', [DiseaseController::class, 'storeSymptoms'])->name('disease.store.symptoms');
    Route::delete('/gangguan/{id}/hapus/gejala', [DiseaseController::class, 'deleteSymptoms'])->name('disease.delete.symptoms');

    // Article
    Route::get('/artikel', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/artikel/tambah', [ArticleController::class, 'add'])->name('article.add');
    Route::post('/artikel/tambah', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/artikel/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/artikel/edit/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/artikel/hapus/{id}', [ArticleController::class, 'delete'])->name('article.delete');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');