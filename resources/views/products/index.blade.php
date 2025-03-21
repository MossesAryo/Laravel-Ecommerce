@extends('layouts.layout')

@section('main')
    <div class="container-lg mt-4">
        <div class="table-responsive">
            <div class="table-wrapper shadow-sm p-4 bg-white rounded">
                <div class="table-title mb-3">
                    <div class="row align-items-center">
                        <div class="col-sm-8">
                            <h2 class="text-primary">Manajemen <b>Produk</b></h2>
                        </div>
                        <div class="col-sm-4 text-end">
                            <a href="{{ route('create') }}" class="btn btn-info add-new">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </div>
                        <div class="col-sm-4 text-start">
                            <form action="{{ route('Dashboard') }}" method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Cari Produk..." value="{{ request('keyword') }}">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->nama_produk }}</td>
                                <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->stok }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit', $item->id) }}" class="btn btn-primary btn-sm mx-1"
                                        title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-1" title="Delete"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
