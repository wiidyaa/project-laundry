
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('layanan.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Profile untuk semua pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route yang boleh diakses Admin dan Staff
Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

    Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');

    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');

    Route::get('/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');

    Route::put('/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
});

// Route khusus Admin untuk menghapus layanan
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');
});

require __DIR__.'/auth.php';
