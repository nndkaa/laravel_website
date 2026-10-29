<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kasir nanda - Manajemen Produk</title>
    <style>
        /* CSS Untuk Mempercantik Tampilan Ala Aplikasi Kasir */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; }
        
        /* Bagian Header / Navbar */
        .navbar { background-color: #435ebe; color: white; padding: 15px 20px; font-size: 22px; font-weight: bold; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        
        /* Pengaturan Layout Kiri dan Kanan */
        .container { display: flex; flex-wrap: wrap; padding: 20px; gap: 20px; max-width: 1200px; margin: 0 auto; }
        .card { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .col-form { flex: 1; min-width: 350px; }
        .col-list { flex: 2; min-width: 500px; }
        
        /* Desain Formulir */
        h3 { margin-bottom: 20px; color: #435ebe; border-bottom: 2px solid #e9ecef; padding-bottom: 10px;}
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; font-size: 14px; color: #555; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; background: #fafafa;}
        .form-control:focus { outline: none; border-color: #435ebe; background: #fff;}
        .btn-submit { width: 100%; background-color: #435ebe; color: white; padding: 12px; border: none; border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn-submit:hover { background-color: #30449e; }
        
        /* Notifikasi Sukses */
        .alert-success { background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #c3e6cb; font-weight: bold;}
        
        /* Desain Tabel Daftar Produk */
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table th, .table td { border-bottom: 1px solid #eee; padding: 12px; text-align: left; vertical-align: middle; }
        .table th { background-color: #f8f9fa; color: #555; font-weight: 600; }
        .table tbody tr:hover { background-color: #fcfcfc; }
        .badge { background: #28a745; color: white; padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .img-thumbnail { width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #ddd; }
    </style>
</head>
<body>

    <div class="navbar">
        🛒 Aplikasi Kasir Pintar
    </div>

    <div class="container">
        <!-- ================= BAGIAN KIRI: FORM TAMBAH PRODUK ================= -->
        <div class="card col-form">
            <h3>➕ Tambah Produk Baru</h3>
            
            @if(session('success'))
                <div class="alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Air Mineral Le Minerale" required>
                </div>
                <div class="form-group">
                    <label>SKU (Kode Barang)</label>
                    <input type="text" name="sku" class="form-control" placeholder="Contoh: AIR-001" required>
                </div>
                <div class="form-group">
                    <label>Harga Jual (Rp)</label>
                    <input type="number" name="price" class="form-control" placeholder="Contoh: 5000" required>
                </div>
                <div class="form-group">
                    <label>Stok Barang</label>
                    <input type="number" name="stock" class="form-control" placeholder="Contoh: 100" required>
                </div>
                <div class="form-group">
                    <label>Upload Gambar Produk</label>
                    <input type="file" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg, image/webp" style="padding: 7px; background: #fff;">
                    <small style="color: gray; font-size: 12px; margin-top:5px; display:block;">*Format: JPG/PNG, Maksimal 2MB</small>
                </div>
                <button type="submit" class="btn-submit">💾 Simpan & Upload Gambar</button>
            </form>
        </div>

        <!-- ================= BAGIAN KANAN: DAFTAR PRODUK ================= -->
        <div class="card col-list">
            <h3>📦 Daftar Produk Terdaftar</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                    <!-- Daftar 1 -->
                    <tr>
                        <td>
                            <!-- Ganti "air.jpg" dengan nama file foto Anda yang ada di folder public/images/ -->
                            <img src="{{ asset('asset/air.jpg') }}" class="img-thumbnail" alt="Air">
                        <td>AIR-001</td>
                        <td><strong>Air Mineral Botol 600ml</strong></td>
                        <td>Rp 5.000</td>
                        <td><span class="badge">Stok: 45</span></td>
                    </tr>
                    
                    <!-- Daftar 2 -->
                    <tr>
                        <td>
                            <!-- Ganti "kopi.jpg" dengan nama file foto Anda -->
                            <img src="{{ asset('asset/kopi.jpg') }}" class="img-thumbnail" alt="Kopi">
                        <td>KOP-002</td>
                        <td><strong>Kopi Susu Gula Aren</strong></td>
                        <td>Rp 15.000</td>
                        <td><span class="badge">Stok: 20</span></td>
                    </tr>
                    
                    <!-- Daftar 3 (Bunga) -->
                    <tr>
                        <td>
                            <!-- Ini kode untuk memanggil bunga.jpg -->
                            <img src="{{ asset('asset/bunga.jpg') }}" class="img-thumbnail" alt="Bunga">
                        </td>
                        <td>BNG-003</td>
                        <td><strong>Bunga Hias Cantik</strong></td>
                        <td>Rp 25.000</td>
                        <td><span class="badge">Stok: 15</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>