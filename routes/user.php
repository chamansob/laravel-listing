<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/dashboard', [ProfileController::class, 'UserDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/coach', [ProfileController::class, 'AddCoach'])->name('user.coach.add');
    Route::post('/coach', [ProfileController::class, 'Coachstore'])->name('user.coach.store');
    Route::get('/coach/edit', [ProfileController::class, 'CoachEdit'])->name('user.coach.edit');
    Route::put('/coach/edit/{id}', [ProfileController::class, 'UpdateCoach'])->name('user.coach.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
