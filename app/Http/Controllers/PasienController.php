<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::all();
        return response()->json($pasien);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePasienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePasienRequest $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }

    public function pasienMasuk(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string',
            'umur_pasien' => 'required|integer|min:1',
            'nama_penyakit' => 'required|string',
            'kamar_id' => 'required|exists:kamars,id'
        ]);

        $kamar = Kamar::findOrFail($request->kamar_id);
        if (!$kamar->ketersediaan_kamar)
        {
            return response()->json(['message' => 'Kamar tidak tersedia atau sedang digunakan']);
        }

        $pasien = Pasien::create([
            'nama_pasien' => $request->nama_pasien,
            'umur_pasien' => $request->umur_pasien,
            'nama_penyakit' => $request->nama_penyakit,
            'kamar_id' => $request->kamar_id
        ]);

        $kamar->ketersediaan_kamar = false;
        $kamar->save();

        return response()->json($pasien);
    }

    public function pasienKeluar($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        $kamar = Kamar::findOrFail($pasien->kamar_id);
        $kamar->ketersediaan_kamar = true;
        $kamar->save();
        return response()->json(null);
    }
}
