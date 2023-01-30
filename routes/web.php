<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToDoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('to-do-list', [ToDoController::class, 'index'])->name('to-do-list');

Route::prefix('to-do-list')->group(function () {
    Route::get('/edit/{id}', [ ToDoController::class, 'edit'])->name('todo.edit');
    Route::post('/remove', [ToDoController::class, 'remove'])->name('todo.remove');
    Route::post('/add', [ToDoController::class, 'add'])->name('todo.add');
    Route::post('/save', [ToDoController::class, 'save'])->name('todo.save');
});


