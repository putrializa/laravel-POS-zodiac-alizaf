<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

use Carbon\Carbon;


use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        try {
            $transaksi = Transaksi::all();
            return view('transaksi.index', compact('transaksi'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $produk = Product::all();
        return view('transaksi.create', compact('produk'));
    }

    public function store(Request $request)
    {
        logger('📝 Request store transaksi:', $request->all());

        $request->validate([
            'customer' => 'required|string',
            'produk_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1'
        ]);
    
        $produk = Product::findOrFail($request->produk_id);
        
        // Pastikan harga dikonversi jadi angka
        logger('💰 Total sebelum konversi: ' . $request->total);
        $total = preg_replace('/[^0-9]/', '', $request->total); 
        $total = (int) $total; // Konversi ke integer
        logger('💸 Total setelah konversi: ' . $total);
    
        if ($produk->stock < $request->jumlah) {
            logger('⚠️ Stok tidak cukup: Stok=' . $produk->stock . ', Permintaan=' . $request->jumlah);
             return back()->with('error', 'Stok tidak mencukupi');
        }
    
        $transaksi = Transaksi::create([
            'kode_transaksi' => 'TRX' . now()->format('YmdHis'),
            'customer' => $request->customer,
            'total' => $total,
            'tanggal' => now() // atau isi manual '2025-03-21'
        ]);
        logger('✅ Transaksi berhasil dibuat:', $transaksi->toArray());

        $produk->decrement('stock', $request->jumlah);
        logger('📉 Stok produk dikurangi, sisa stok: ' . $produk->stock);
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function cetakNota($id)
    {
        $transaksi = Transaksi::with('detail.produk.category')->findOrFail($id);

        return view('transaksi.nota', compact('transaksi'));
    }

    public function harian()
    {
        $transaksiHariIni = Transaksi::whereDate('tanggal', today())->get();
        $totalPendapatan = $transaksiHariIni->sum('total');

        return view('laporan.harian', compact('transaksiHariIni', 'totalPendapatan'));
    }

    // Export PDF
    public function exportPdf()
    {
        $transaksiHariIni = Transaksi::whereDate('tanggal', today())->get();
        $totalPendapatan = $transaksiHariIni->sum('total_harga');

        $pdf = Pdf::loadView('laporan.pdf', compact('transaksiHariIni', 'totalPendapatan'));
        return $pdf->download('laporan-harian.pdf');
    }
    
    public function show($id)
    {
        $transaksi = Transaksi::with('detail.produk')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    // Tambahan: Menghapus transaksi beserta detailnya
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $transaksi = Transaksi::findOrFail($id);
            DetailTransaksi::where('transaksi_id', $id)->delete();
            $transaksi->delete();
            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus transaksi: ' . $e->getMessage());
        }
    }

    public function chartData()
    {
        try {
            logger('📊 chartData() dipanggil');
    
            $data = DB::table('transaksi')
                ->selectRaw('DATE(tanggal) as tanggal, COUNT(*) as jumlah_transaksi, SUM(total) as total_pendapatan')
                ->groupBy('tanggal')
                ->orderBy('tanggal', 'asc')
                ->get();
    
            logger('📥 Data transaksi:', $data->toArray());
    
            return response()->json($data);
        } catch (\Exception $e) {
            logger('❌ Error chartData: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }
    }
    }

    

