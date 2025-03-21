<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $keyword = request()->keyword;

    if ($keyword) {
        $products = Product::where('nama_produk', 'like', '%' . $keyword . '%')
            ->latest()
            ->paginate(6);
    } else {
        $products = Product::latest()->paginate(6);
    }

    return view('products.index', compact('products'));
}

    public function store(Request $request){
      $request->validate([
        'nama_produk' => 'required',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'stok' => 'required|integer',
      ]);

      Product::create($request->all());
      return redirect()->route('Dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('Dashboard')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('Dashboard')->with('success', 'Produk berhasil dihapus!');
    }

    
}
