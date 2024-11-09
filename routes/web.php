<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->name('admin.projects.')->prefix('admin/projects')->group(function() {
    Route::get('/index', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/show/{project}', [ProjectController::class, 'show'])->name('show');
    Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('edit');
    Route::put('/show/{project}', [ProjectController::class, 'update'])->name('update');
    Route::DELETE('/{project}', [ProjectController::class, 'destroy'])->name('delete');
    Route::get('/trash', [ProjectController::class, 'trash'])->name('trash');
    Route::DELETE('/{id}/forceDelete', [ProjectController::class, 'forceDelete'])->name('forceDelete');
});

Route::middleware(['auth'])->name('admin.types.')->prefix('admin/types')->group(function() {
    Route::get('/index', [TypeController::class, 'index'])->name('index');
    Route::get('/show/{type}', [TypeController::class, 'show'])->name('show');
});

Route::middleware(['auth'])->name('admin.technologies.')->prefix('admin/technologies')->group(function() {
    Route::get('/index', [TechnologyController::class, 'index'])->name('index');
});