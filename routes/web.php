<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Http\Controllers\UjianController;

/*
|--------------------------------------------------------------------------
| LOGIN SISWA
|--------------------------------------------------------------------------
*/

Route::get('/login-siswa', function () {
    return view('student-login');
})->name('student.login');

Route::post('/login-siswa', function (Request $request) {

    $request->validate([
        'nis' => 'required',
    ]);

    $student = Siswa::where('nis', $request->nis)->first();

    if (! $student) {
        return back()
            ->withInput()
            ->with('error', 'NIS tidak ditemukan.');
    }

    Auth::guard('student')->login($student);

    return redirect()->route('ujian.index');

})->name('student.login.submit');


/*
|--------------------------------------------------------------------------
| HALAMAN UJIAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth:student')->group(function () {

    Route::get('/ujian', [UjianController::class, 'index'])
        ->name('ujian.index');

    Route::get('/ujian/{id}/mulai', [UjianController::class, 'mulai'])
        ->name('ujian.mulai');

    Route::post('/ujian/{id}/selesai', [UjianController::class, 'selesai'])
        ->name('ujian.selesai');

    Route::get('/ujian/{id}/hasil', [UjianController::class, 'hasil'])
        ->name('ujian.hasil');

    Route::get('/riwayat-ujian', [UjianController::class, 'riwayat'])
        ->name('ujian.riwayat');

});


/*
|--------------------------------------------------------------------------
| LOGOUT SISWA
|--------------------------------------------------------------------------
*/

Route::post('/logout-siswa', function () {

    Auth::guard('student')->logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('student.login');

})->name('student.logout');