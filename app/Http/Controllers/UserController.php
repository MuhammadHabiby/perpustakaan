<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view('home', compact('pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        User::create($request->all());
        return redirect()->back()->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Tambahkan metode lain seperti edit, update, destroy sesuai kebutuhan
}
