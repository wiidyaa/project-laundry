
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan & Tarif - Laundry</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Sistem Operasional Laundry Bojongsoang</h1>
        <nav>
            <a href="{{ route('layanan.index') }}" class="active">
                Daftar Layanan
            </a>

            <a href="{{ route('layanan.create') }}">
                Tambah Layanan
            </a>

            <span>
                {{ auth()->user()->name }}
                ({{ ucfirst(auth()->user()->role) }})
            </span>

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
            <div class="card-header">
                <div>
                    <h2>Modul Layanan & Tarif</h2>
                    <p>Daftar jenis paket cuci, harga, dan estimasi waktu.</p>
                </div>

                <a href="{{ route('layanan.create') }}" class="btn">
                    + Tambah Paket
                </a>
            </div>

            @if (session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Estimasi Waktu</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($layanans as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row->nama_paket }}</td>

                            <td>
                                <span class="badge badge-{{ strtolower($row->jenis) }}">
                                    {{ $row->jenis }}
                                </span>
                            </td>

                            <td>
                                Rp {{ number_format($row->harga, 0, ',', '.') }}
                            </td>

                            <td>{{ $row->estimasi }}</td>

                            <td style="text-align: center;">
                                <a href="{{ route('layanan.edit', $row->id) }}"
                                   class="btn btn-edit"
                                   style="background-color: #f39c12;">
                                    Edit
                                </a>

                                @if (auth()->user()->role === 'admin')
                                    <form action="{{ route('layanan.destroy', $row->id) }}"
                                          method="POST"
                                          style="display:inline-block;"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-delete"
                                                style="background-color: #e74c3c;">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;">
                                Belum ada data layanan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>Putu Widya Kirana Putri - 10202250067 - SI4906</p>
        <p>Kel 9 - Modul Individu A - Modul Layanan & Tarif</p>
    </footer>
</body>
</html>
