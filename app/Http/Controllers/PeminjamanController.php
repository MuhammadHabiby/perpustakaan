<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('dashboard', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'id_pengguna' => 'required|integer',
            'tanggal_peminjaman' => 'required|date',
        ]);

        Peminjaman::create($request->all());
        return redirect()->back()->with('success', 'Peminjaman buku berhasil ditambahkan.');
    }

    // Tambahkan metode lain seperti edit, update, destroy sesuai kebutuhan
}
