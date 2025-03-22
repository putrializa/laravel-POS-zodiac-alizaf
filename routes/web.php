<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengajuanBarangController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/chart-data', [TransaksiController::class, 'chartData'])->name('chart.data');



Route::resource('produk', ProductController::class);
Route::get('/produk/{id}', [ProductController::class, 'show']);


Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index'); // Menampilkan daftar kategori
Route::post('/kategori', [CategoryController::class, 'store'])->name('kategori.store'); // Simpan kategori baru
Route::put('/kategori/{kategori}', [CategoryController::class, 'update'])->name('kategori.update'); // Update kategori
Route::delete('/kategori/{kategori}', [CategoryController::class, 'destroy'])->name('kategori.destroy'); // Hapus kategori


Route::get('/pemasok', [PemasokController::class, 'index'])->name('pemasok.index'); // Menampilkan daftar pemasok
Route::get('/pemasok/create', [PemasokController::class, 'create'])->name('pemasok.create'); // Form tambah pemasok
Route::post('/pemasok', [PemasokController::class, 'store'])->name('pemasok.store'); // Simpan pemasok baru
Route::get('/pemasok/{id}', [PemasokController::class, 'show'])->name('pemasok.show'); // Detail pemasok
Route::get('/pemasok/{id}/edit', [PemasokController::class, 'edit'])->name('pemasok.edit'); // Form edit pemasok
Route::put('/pemasok/{id}', [PemasokController::class, 'update'])->name('pemasok.update'); // Update pemasok
Route::delete('/pemasok/{id}', [PemasokController::class, 'destroy'])->name('pemasok.destroy'); // Hapus pemasok

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/transaksi/{id}/cetak', [TransaksiController::class, 'cetakNota'])->name('transaksi.cetak');
Route::get('/transaksi/nota/{id}', [TransaksiController::class, 'cetakNota'])->name('transaksi.nota');
Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::put('/member/{member}', [MemberController::class, 'update'])->name('member.update');
Route::delete('/member/{member}', [MemberController::class, 'destroy'])->name('member.destroy');

Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
Route::post('/pembelian', [PembelianController::class, 'store'])->name('pembelian.store');
Route::get('/pembelian/{pembelian}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
Route::put('/pembelian/{pembelian}', [PembelianController::class, 'update'])->name('pembelian.update');

Route::resource('pengajuan-barang', PengajuanBarangController::class);
Route::get('pengajuan-barang/export/excel', [PengajuanBarangController::class, 'exportExcel'])->name('pengajuan-barang.export.excel');
Route::get('pengajuan-barang/export/pdf', [PengajuanBarangController::class, 'exportPdf'])->name('pengajuan-barang.export.pdf');
Route::put('/pengajuan-barang/toggle/{id}', [PengajuanBarangController::class, 'toggle'])->name('pengajuan-barang.toggle');

Route::get('/laporan/harian', [TransaksiController::class, 'harian'])->name('laporan.harian');
Route::get('/laporan/export-pdf', [TransaksiController::class, 'exportPdf'])->name('laporan.export.pdf');

// routes/web.php

