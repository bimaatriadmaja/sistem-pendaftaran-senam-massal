<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:pesertas,nik',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date|before:2010-01-01', // contoh: minimal umur 15 tahun
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.create')->with('success', 'Pendaftaran berhasil!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta-edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('pesertas', 'nik')->ignore($id),
            ],
            'no_hp' => [
                'required',
                'numeric',
                Rule::unique('pesertas', 'no_hp')->ignore($id),
            ],
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date|before:2010-01-01',
        ]);

        $peserta = Peserta::findOrFail($id);

        $peserta->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Data peserta berhasil diperbarui.');
    }

    // Method destroy: hapus peserta
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('dashboard')->with('success', 'Data peserta berhasil dihapus.');
    }

    public function checkForm()
    {
        return view('peserta.cek');
    }

    public function checkData(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16',
        ]);

        $peserta = Peserta::where('nik', $request->nik)->first();

        if (!$peserta) {
            // Kirim error ke session agar bisa dibaca di Blade
            return redirect()->back()->with('error', 'Data tidak ditemukan. Pastikan NIK yang dimasukkan sesuai saat pendaftaran.');
        }

        return view('peserta.cek', compact('peserta'));
    }


}
