<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;

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
    if (Auth::check()) {
        return redirect()->route('tasks.index'); // Arahkan ke halaman tasks jika sudah login
    }
    return redirect()->route('auth.login'); // Arahkan ke halaman login jika belum login
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.showFormRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // Show incomplete tasks
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Show form to create task
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Store task
    Route::put('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete'); // Mark as completed
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete task
});
Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});



