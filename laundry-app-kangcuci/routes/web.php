<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminComplaintController;

Route::get('/', function () {
    // dd(app('auth'));

    return view('welcome');
});



Route::middleware(['auth', 'role:staf'])->group(function () {
    

});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
    Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/complaints/create', [ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('/complaints/{complaint}/edit', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::put('/complaints/{complaint}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk User
// Route::middleware(['auth'])->group(function () {
//     Route::resource('complaints', ComplaintController::class);
// });

// Route untuk Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
    Route::get('complaints', [AdminComplaintController::class, 'indexAdmin'])->name('complaints.indexAdmin');
    Route::get('complaints/{id}', [AdminComplaintController::class, 'show'])->name('complaints.show');
    Route::post('complaints/{id}', [AdminComplaintController::class, 'respond'])->name('complaints.respond');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/complaints', [AdminComplaintController::class, 'index'])->name('admin.complaints.index');
    Route::get('/admin/complaints/{complaint}', [AdminComplaintController::class, 'show'])->name('complaints.show');
    Route::put('/admin/complaints/{complaint}/status', [AdminComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('role:admin');

require __DIR__.'/auth.php';
