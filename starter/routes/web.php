<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageGroupController;


Route::get('/', [MessageGroupController::class, 'index'])->middleware(['auth'])->name('messages');
Route::get('/group/{messageGroup}', \App\Livewire\MessageGroupPage::class)->middleware(['auth'])->name('message.group');
Route::get('/start', \App\Livewire\CreateMessageGroupPage::class)->middleware(['auth'])->name('message.start');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
