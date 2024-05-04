<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\CandidateController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware('auth')->group(function () {
    Route::post('/election/vote', [ElectionController::class, 'vote'])->name('election.vote');
    Route::get('/election', [ElectionController::class, 'index'])->name('election.index');
    Route::get('/election/{id}', [ElectionController::class, 'detail'])->name('election.detail');
});

Route::middleware('auth', \App\Http\Middleware\AdminOnly::class)->group(function () {
    Route::get('/candidate/add', [CandidateController::class, 'add'])->name('candidate.add');
    Route::post('/candidate/add', [CandidateController::class, 'store'])->name('candidate.store');
    Route::get('/candidate/edit/{id}', [CandidateController::class, 'edit'])->name('candidate.edit');
    Route::post('/candidate/edit/{id}', [CandidateController::class, 'update'])->name('candidate.update');

    Route::get('/election/add', [ElectionController::class, 'add'])->name('election.add');
    Route::post('/election/add', [ElectionController::class, 'store'])->name('election.store');
    Route::get('/election/edit/{id}', [ElectionController::class, 'edit'])->name('election.edit');
    Route::post('/election/edit/{id}', [ElectionController::class, 'update'])->name('election.update');
});

require __DIR__.'/auth.php';
