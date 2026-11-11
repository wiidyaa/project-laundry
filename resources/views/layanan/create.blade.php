<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan Baru - Laundry</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Sistem Operasional Laundry Bojongsoang</h1>
        <nav>
            <a href="{{ route('layanan.index') }}">Daftar Layanan</a>
            <a href="{{ route('layanan.create') }}" class="active">Tambah Layanan</a>
            <form action="{{ url('/logout') }}" method="POST" class="form-logout">
                @csrf
                <p class="tengah">
                    <button type="submit" class="tombol">Logout</button>
                </p>
            </form>
        </nav>
    </header>
    
    <div class="container">
        <div class="card">
            <h2>Tambah Paket Layanan Baru</h2>
            <p style="margin-bottom: 15px; color: #666;">Isi form di bawah untuk menambah paket baru.</p>
            
            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('layanan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" id="nama_paket" name="nama_paket" placeholder="Masukkan nama paket..." value="{{ old('nama_paket') }}" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Kategori Paket</label>
                    <select id="jenis" name="jenis" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Kiloan" {{ old('jenis') == 'Kiloan' ? 'selected' : '' }}>Kiloan</option>
                        <option value="Satuan" {{ old('jenis') == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                        <option value="Express" {{ old('jenis') == 'Express' ? 'selected' : '' }}>Express</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="harga">Harga (Rp)</label>
                        <input type="number" id="harga" name="harga" placeholder="Contoh: 10000" value="{{ old('harga') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="estimasi">Estimasi Waktu</label>
                        <input type="text" id="estimasi" name="estimasi" placeholder="Contoh: 1 Hari / 3 Jam" value="{{ old('estimasi') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi (Opsional)</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Keterangan singkat paket...">{{ old('deskripsi') }}</textarea>
                </div>
                <div style="text-align: right; margin-top: 15px;">
                    <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn">Simpan Paket</button>
                </div>
            </form>
        </div>
    </div>
    
    <footer>
        <p>Putu Widya Kirana Putri - 10202250067 - SI4906</p>
        <p>Kel 9 - Modul Individu A - Modul Layanan & Tarif</p>
    </footer>
</body>
</html>