<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF; // Untuk export PDF

class LaporanController extends Controller
{
    // Method untuk tampilkan laporan hari ini
    public function harian()
    {
        $transaksiHariIni = Transaksi::whereDate('tanggal', today())->get();
        $totalPendapatan = $transaksiHariIni->sum('total_harga');

        return view('laporan.harian', compact('transaksiHariIni', 'totalPendapatan'));
    }

    // Export PDF
    public function exportPdf()
    {
        $transaksiHariIni = Transaksi::whereDate('tanggal', today())->get();
        $totalPendapatan = $transaksiHariIni->sum('total_harga');

        $pdf = FacadePdf::loadView('laporan.pdf', compact('transaksiHariIni', 'totalPendapatan'));
        return $pdf->download('laporan-harian.pdf');
    }
}

