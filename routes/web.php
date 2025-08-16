<?php

use App\Http\Controllers\ArticleTagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardGuestController;
use App\Http\Controllers\DashboardCreatorController;
use App\Http\Controllers\ProfileTestController;

Route::get('/', function () {
    //return Inertia::render('Welcome');
    $user = Auth::user();

    if ($user) {
        return redirect()->route('dashboard.creator');
    }

    return redirect()->route('dashboard.guest');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/dashboard-guest', [DashboardGuestController::class, 'index'])->name('dashboard.guest');

    Route::post('/article-tags/guest-update-selected', [ArticleTagController::class, 'guestUpdateSelected'])->name('article.tags.guest.update.selected');

    Route::get('/profiles/{session}', [ProfileTestController::class, 'show'])->name('profile.form.show');
    Route::put('/profiles/{session}', [ProfileTestController::class, 'update'])->name('profile.form.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard-creator', [DashboardCreatorController::class, 'index'])->name('dashboard.creator');

    Route::post('/article-tags/update-selected', [ArticleTagController::class, 'updateSelected'])->name('article.tags.update.selected');


});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
