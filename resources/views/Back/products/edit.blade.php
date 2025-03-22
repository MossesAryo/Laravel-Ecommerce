@extends('back.layouts.layout')

@section('main')
    <div class="container-lg mt-4">
        <div class="card shadow-sm p-4 bg-white rounded">
            <h3 class="mb-0">Edit Product</h3>
            <div class="card-body">
                <form action="{{ route('UpdateProduk', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                            value="{{ $product->nama_produk }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga"
                            value="{{ $product->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            value="{{ $product->deskripsi }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok"
                            value="{{ $product->stok }}" required>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('Dashboard') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
