<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim'           => 'required|unique:mahasiswas,nim',
            'nama'          => 'required|string|max:255',
            'program_studi' => 'required|string',
            'email'         => 'required|email|unique:mahasiswas,email',
            'angkatan'      => 'required|numeric',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim'           => 'required|unique:mahasiswas,nim,'.$mahasiswa->id,
            'nama'          => 'required|string|max:255',
            'program_studi' => 'required|string',
            'email'         => 'required|email|unique:mahasiswas,email,'.$mahasiswa->id,
            'angkatan'      => 'required|numeric',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}