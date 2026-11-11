<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan - Laundry</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Sistem Operasional Laundry Bojongsoang</h1>
        <nav>
            <a href="{{ route('layanan.index') }}">Daftar Layanan</a>
            <a href="{{ route('layanan.create') }}">Tambah Layanan</a>
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
            <h2>Edit Paket Layanan</h2>
            
            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input type="text" name="nama_paket" value="{{ old('nama_paket', $layanan->nama_paket) }}" required>
                </div>
                <div class="form-group">
                    <label>Kategori Paket</label>
                    <select name="jenis" required>
                        <option value="Kiloan" {{ old('jenis', $layanan->jenis) == 'Kiloan' ? 'selected' : '' }}>Kiloan</option>
                        <option value="Satuan" {{ old('jenis', $layanan->jenis) == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                        <option value="Express" {{ old('jenis', $layanan->jenis) == 'Express' ? 'selected' : '' }}>Express</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', $layanan->harga) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Estimasi Waktu</label>
                        <input type="text" name="estimasi" value="{{ old('estimasi', $layanan->estimasi) }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" rows="3">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                </div>
                <div style="text-align: right; margin-top: 15px;">
                    <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn">Simpan Perubahan</button>
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