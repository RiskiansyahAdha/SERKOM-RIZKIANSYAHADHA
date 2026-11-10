<div class="form-group">
    <label for="nama_product">Nama Produk</label>
    <input
        id="nama_product"
        name="nama_product"
        type="text"
        value="{{ old('nama_product', $product->nama_product ?? '') }}"
        class="form-control @error('nama_product') is-invalid @enderror"
    >
    @error('nama_product')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea
        id="deskripsi"
        name="deskripsi"
        rows="5"
        class="form-control @error('deskripsi') is-invalid @enderror"
    >{{ old('deskripsi', $product->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="harga">Harga</label>
    <input
        id="harga"
        name="harga"
        type="number"
        min="0"
        value="{{ old('harga', $product->harga ?? '') }}"
        class="form-control @error('harga') is-invalid @enderror"
    >
    @error('harga')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="gambar">Nama file gambar (opsional)</label>
    <input
        id="gambar"
        name="gambar"
        type="text"
        placeholder="contoh: kopi-original.jpg"
        value="{{ old('gambar', $product->gambar ?? '') }}"
        class="form-control @error('gambar') is-invalid @enderror"
    >
    @error('gambar')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-actions">
    <button class="btn" type="submit">{{ $tombol }}</button>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">
        Batal
    </a>
</div>
