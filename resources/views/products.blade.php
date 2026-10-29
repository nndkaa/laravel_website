<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>

    {{-- Pesan Sukses jika produk berhasil ditambahkan --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Form WAJIB menggunakan enctype="multipart/form-data" agar bisa kirim gambar --}}
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="name" required>
        </div>
        <br>

        <div>
            <label>SKU (Kode Barang):</label><br>
            <input type="text" name="sku" required>
        </div>
        <br>

        <div>
            <label>Harga:</label><br>
            <input type="number" name="price" required>
        </div>
        <br>

        <div>
            <label>Stok:</label><br>
            <input type="number" name="stock" required>
        </div>
        <br>

        <div>
            <label>Upload Gambar Produk (JPG/PNG):</label><br>
            <!-- INI ADALAH TOMBOL UNTUK MEMASUKKAN GAMBAR SENDIRI -->
            <input type="file" name="image" accept="image/png, image/jpeg, image/jpg, image/webp">
        </div>
        <br>

        <button type="submit">Simpan Produk</button>
    </form>
</body>
</html>