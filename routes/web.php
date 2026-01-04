<?php

use App\Http\Controllers\ArtsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ToggleController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::middleware('auth')->group(function () {

    // Toggle artist status
    Route::post('/artists/{id}/toggle-status', [ToggleController::class, 'toggleStatus'])->name('artists.toggleStatus');

    // Gebruikersprofiel
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

    // Laravel standaard profiel (optioneel)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categorieën
    Route::resource('/categories', CategoryController::class);
});

// Arts routes
Route::resource('/arts', ArtsController::class);
Route::post('arts/{art}/toggleActive', [ArtsController::class, 'toggleActive'])->name('art.toggleActive');

// Admin routes
Route::resource('admin', AdminController::class);

// Home route
Route::resource('/', HomeController::class);

// Over pagina
Route::get('/about', [AboutController::class, 'about'])->name('about');

// Admin login shortcut
Route::get('/admin-login', function () {
    $admin = User::where('role', 'admin')->first();
    if ($admin) {
        Auth::login($admin);
        return redirect('/')->with('success', 'Logged in as Admin');
    }
    return redirect('/')->with('error', 'No admin user found');
})->name('admin.login');

// Maak een test admin
Route::get('/make-admin', function () {
    \App\Models\User::create([
        'name' => 'Admin Test',
        'email' => 'admin@test.com',
        'password' => bcrypt('wachtwoord'),
        'role' => 'admin',
    ]);
    return 'Admin succesvol aangemaakt!';
});

require __DIR__.'/auth.php';
