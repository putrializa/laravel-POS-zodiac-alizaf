<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::with('pemasok')->get();
        return view('pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $pemasok = Pemasok::all();
        return view('pembelian.create', compact('pemasok'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemasok_id' => 'required|exists:pemasok,id',
            'tanggal' => 'required|date',
            'total_harga' => 'required|numeric',
        ]);

        Pembelian::create($request->all());
        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil ditambahkan');
    }

    public function edit(Pembelian $pembelian)
    {
        $pemasok = Pemasok::all();
        return view('pembelian.edit', compact('pembelian', 'pemasok'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'pemasok_id' => 'required|exists:pemasok,id',
            'tanggal' => 'required|date',
            'total_harga' => 'required|numeric',
        ]);

        $pembelian->update($request->all());
        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diperbarui');
    }
}
