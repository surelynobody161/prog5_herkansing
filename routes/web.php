<?php
use App\Http\Controllers\ArtsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ToggleController;
//admin rules
//Route::middleware(['auth', 'admin'])->group(function () {
//    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//    Route::delete('/dashboard/art/{id}', [AdminController::class, 'deleteArt'])->name('admin.art.delete');
//});
//user rules
Route::middleware('auth')->group(function () {
    Route::post('/artists/{id}/toggle-status', [ToggleController::class, 'toggleStatus'])->name('artists.toggleStatus');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/categories', CategoryController::class);

    Route::get('/arts/{id}', [ArtsController::class, 'show'])->name('arts.show');


});
//guest rules
Route::get('/arts', [ArtsController::class, 'index'])->name('arts.index');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', [AboutController::class, 'about'])->name('about');

require __DIR__.'/auth.php';
