<?php

// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\WebUserController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\KabarDesaController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\InformasiDesaController;

Route::get('/home', function () {
    return view('landing-page');
});

Route::get('/kabar-desa', [KabarDesaController::class, 'index'])->name('kabar-desa');
Route::get('/kabar-desa-informasi', [KabarDesaController::class, 'indexInformasi']);
Route::post('/submit_comment', [KabarDesaController::class, 'store']);
Route::post('/submit_broadcast', [KabarDesaController::class, 'storeBroadcast'])->name('broadcast.store');



Route::get('/login-admin', function () {
    return view('login-admin');
})->name('login.admin');

// Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('login.admin.post');

// Route::middleware(['admin'])->group(function () {
//     Route::get('/', [InformasiDesaController::class, 'index']);
//     Route::get('/sdgs', [InformasiDesaController::class, 'index']);
//     Route::get('/proyek', [ProyekController::class, 'index']);
//     Route::get('/kependudukan', [KependudukanController::class, 'index']);
//     Route::get('/keuangan', [KeuanganController::class, 'index']);
//     Route::get('/layanan-surat', function () {
//         return view('layanan-surat');
//     });
//     Route::get('/penyetujuan', [DocumentsController::class, 'index'])->name('penyetujuan.index');
//     Route::post('/penyetujuan/update-status/{id}', [DocumentsController::class, 'updateStatus'])->name('penyetujuan.updateStatus');
//     Route::get('/tambahkan-file', function () {
//         return view('addDocument');
//     });
//     Route::get('/kelola-web-user', [WebUserController::class, 'index']);
//     Route::get('/get-topics', [WebUserController::class, 'getTopics']);
// });


Route::get('/', [InformasiDesaController::class, 'index']);
Route::get('/sdgs', [InformasiDesaController::class, 'index']);

Route::get('/proyek', [ProyekController::class, 'index']);



Route::get('/kependudukan', [KependudukanController::class, 'index']);

Route::get('/keuangan', function () {
    return view('keuangan', [KeuanganController::class, 'index']);
});

Route::get('/layanan-surat', [SuratController::class, 'index']);

Route::get('/layanan-surat', [SuratController::class, 'layananSurat'])->name('layanan-surat');

Route::get('/penyetujuan', [DocumentsController::class, 'index'])->name('penyetujuan.index');
Route::post('/penyetujuan/update-status/{id}', [DocumentsController::class, 'updateStatus'])->name('penyetujuan.updateStatus');
Route::get('/tambahkan-file', function () {
    return view('addDocument');
});

Route::get('/kelola-web-user', [WebUserController::class, 'index']);
Route::get('/get-topics', [WebUserController::class, 'getTopics']);
