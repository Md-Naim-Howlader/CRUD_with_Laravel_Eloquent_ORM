
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// student routes
Route::get('/students', [StudentController::class, "index"])->name('student.index');
Route::get('/students/create', [StudentController::class, "create"])->name('student.create');
Route::post('/students/store', [StudentController::class, "store"])->name('student.store');
Route::get('/student/edit/{id}', [StudentController::class, "edit"])->name('student.edit');
Route::put('/student/update/{id}', [StudentController::class, "update"])->name('student.update');
Route::delete('/student/delete/{id}', [StudentController::class, "destroy"])->name('student.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});