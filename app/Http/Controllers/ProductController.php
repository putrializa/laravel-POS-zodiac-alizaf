<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Tampilkan semua Produk
    public function index()
    {
        // Load data Produk beserta relasi Category
        $produk = Product::with('category')->get();
        return view('produk.index', compact('produk'));
    }

    // 2. Tampilkan form tambah Produk
    public function create()
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();
        return view('produk.create', compact('categories'));
    }

    // 3. Simpan data Produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        Product::create($request->all());

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. Detail Produk tertentu
    public function show($id)
    {
        $produk = Product::with('category')->findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    // 5. Tampilkan form edit Produk
    public function edit($id)
    {
        $produk = Product::findOrFail($id);
        $categories = Category::all();
        return view('produk.edit', compact('produk', 'categories'));
    }

    // 6. Update data Produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $produk = Product::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    // 7. Hapus data Produk
    public function destroy($id)
    {
        $produk = Product::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}
