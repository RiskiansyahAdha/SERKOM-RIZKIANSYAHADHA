{{-- @extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<main class="admin-page">
    <div class="container admin-container">
        <div class="page-heading">
            <div>
                <span class="eyebrow">Pengelolaan produk</span>
                <h1>Daftar Produk</h1>
            </div>
            <a class="btn" href="{{ route('products.create') }}">Tambah Produk</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="product-grid">
            @forelse ($products as $product)
                <article class="product-card">
                    <img
                        src="{{ asset('images/' . ($product->gambar ?: 'kopi-default.jpg')) }}"
                        alt="{{ $product->nama_product }}"
                    >
                    <div class="product-body">
                        <h3>{{ $product->nama_product }}</h3>
                        <p>{{ $product->deskripsi }}</p>
                        <strong>
                            Rp{{ number_format($product->harga, 0, ',', '.') }}
                        </strong>
                        <div class="product-actions">
                            <a class="btn btn-small" href="{{ route('products.edit', $product) }}">Edit</a>
                            <form method="POST" action="{{ route('products.destroy', $product) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-small btn-danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    Belum ada Produk. Silakan tambahkan data Produk.
                </div>
            @endforelse
        </div>
    </div>
</main>
@endsection --}}

@extends('layouts.app')

@section('title', 'Kelola Produk')

@section('content')
<main class="admin-page">
    <div class="container admin-container wide">
        <div class="page-heading">
            <div>
                <span class="eyebrow">Dashboard sederhana</span>
                <h1>Kelola Produk</h1>
            </div>
            <div class="heading-actions">
                <a class="btn btn-secondary" href="{{ route('landing') }}">
                    Lihat Landing Page
                </a>
                <a class="btn" href="{{ route('products.create') }}">
                    Tambah product
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $product->nama_product }}</strong>
                                <small>{{ $product->deskripsi }}</small>
                            </td>
                            <td>
                                Rp{{ number_format($product->harga, 0, ',', '.') }}
                            </td>
                            <td>
                              
                                <img src="{{ asset('images/' . ($product->gambar ?: 'kopi-default.jpg')) }}" alt="{{ $product->gambar }}" class="img-fluid" >
                            
                            </td>
                            <td class="actions">
                                <a class="btn btn-small btn-edit"
                                   href="{{ route('products.edit', $product) }}">
                                    Edit
                                </a>
                                <form method="POST"
                                      action="{{ route('products.destroy', $product) }}"
                                      onsubmit="return confirm('Hapus product ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-small btn-danger"
                                            type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">
                                Belum ada product.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
