<!DOCTYPE html>
<html lang="id"> <!-- Mengubah lang menjadi id untuk bahasa Indonesia -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div>
                <a href="#users">Pengguna</a>
                <a href="#peminjaman">Peminjaman Buku</a>
                <a href="#pengembalian">Pengembalian Buku</a>
                <a href="#search">Pencarian Buku</a>
                <a href="#buku">Buku</a>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>

        <h1>Dashboard Admin</h1>
        <p>Selamat datang di dashboard Anda!</p>

        <!-- Pencarian Buku -->
        <h2 id="search">Pencarian Buku</h2>
        <form action="{{ route('books.search') }}" method="GET">
            <input type="text" name="query" placeholder="Cari buku..." required>
            <button type="submit">Cari</button>
        </form>

        <!-- CRUD Pengguna -->
        <h2 id="users">CRUD Pengguna</h2>
        <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="role" required>
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button type="submit">Tambah Pengguna</button>
        </form>

        <h3>Data Pengguna</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($pengguna->isEmpty())
                    <tr>
                        <td colspan="5">Tidak ada data pengguna.</td>
                    </tr>
                @else
                    @foreach ($pengguna as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('pengguna.edit', $user->id) }}" method="GET" style="display:inline;">
                                <button type="submit">Edit</button>
                            </form>
                            <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- CRUD Peminjaman Buku -->
        <h2 id="peminjaman">CRUD Peminjaman Buku</h2>
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <input type="text" name="judul_buku" placeholder="Judul Buku" required>
            <input type="text" name="id_pengguna" placeholder="ID Pengguna" required>
            <input type="date" name="tanggal_peminjaman" required>
            <button type="submit">Tambah Peminjaman Buku</button>
        </form>

        <h3>Data Peminjaman Buku</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>ID Pengguna</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($peminjaman->isEmpty())
                    <tr>
                        <td colspan="5">Tidak ada data peminjaman buku.</td>
                    </tr>
                @else
                    @foreach ($peminjaman as $loan)
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->judul_buku }}</td>
                        <td>{{ $loan->id_pengguna }}</td>
                        <td>{{ $loan->tanggal_peminjaman }}</td>
                        <td>
                            <form action="{{ route('peminjaman.edit', $loan->id) }}" method="GET" style="display:inline;">
                                <button type="submit">Edit</button>
                            </form>
                            <form action="{{ route('peminjaman.destroy', $loan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- CRUD Pengembalian Buku -->
        <h2 id="pengembalian">CRUD Pengembalian Buku</h2>
        <form action="{{ route('pengembalian.store') }}" method="POST">
            @csrf
            <input type="text" name="id_peminjaman" placeholder="ID Peminjaman" required>
            <input type="date" name="tanggal_pengembalian" required>
            <button type="submit">Tambah Pengembalian Buku</button>
        </form>

        <h3>Data Pengembalian Buku</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($pengembalian->isEmpty())
                    <tr>
                        <td colspan="4">Tidak ada data pengembalian buku.</td>
                    </tr>
                @else
                    @foreach ($pengembalian as $return)
                    <tr>
                        <td>{{ $return->id }}</td>
                        <td>{{ $return->id_peminjaman }}</td>
                        <td>{{ $return->tanggal_pengembalian }}</td>
                        <td>
                            <form action="{{ route('pengembalian.destroy', $return->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- CRUD Buku -->
        <h2 id="buku">CRUD Buku</h2>
        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <input type="text" name="judul" placeholder="Judul Buku" required>
            <input type="text" name="pengarang" placeholder="Pengarang" required>
            <input type="text" name="penerbit" placeholder="Penerbit" required>
            <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required>
            <button type="submit">Tambah Buku</button>
        </form>

        <h3>Data Buku</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($buku->isEmpty())
                    <tr>
                        <td colspan="6">Tidak ada data buku.</td>
                    </tr>
                @else
                    @foreach ($buku as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->judul }}</td>
                        <td>{{ $book->pengarang }}</td>
                        <td>{{ $book->penerbit }}</td>
                        <td>{{ $book->tahun_terbit }}</td>
                        <td>
                            <form action="{{ route('buku.edit', $book->id) }}" method="GET" style="display:inline;">
                                <button type="submit">Edit</button>
                            </form>
                            <form action="{{ route('buku.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
