<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'jenis'      => 'required|in:Kiloan,Satuan,Express',
            'harga'      => 'required|numeric',
            'estimasi'   => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Data layanan berhasil disimpan!');
    }

    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'jenis'      => 'required|in:Kiloan,Satuan,Express',
            'harga'      => 'required|numeric',
            'estimasi'   => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
        ]);

        $layanan->update($request->all());

        return redirect()->route('layanan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Data berhasil dihapus!');
    }
}