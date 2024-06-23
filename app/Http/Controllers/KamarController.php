<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Http\Requests\StoreKamarRequest;
use App\Http\Requests\UpdateKamarRequest;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::all();
        return response()->json($kamar);
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
    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|string',
            'nomor_kamar' => 'required|string',
            'level_kamar' => 'required|in:VIP,Reguler,Ekonomi'
        ]);

        $kamar = Kamar::create([
            'nama_kamar' => $request->nama_kamar,
            'nomor_kamar' => $request->nomor_kamar,
            'level_kamar' => $request->level_kamar,
            'ketersediaan_kamar' => true
        ]);

        return response()->json($kamar);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKamarRequest $request, Kamar $kamar, $id)
    {
        $request->validate([
            'nama_kamar' => 'required|string',
            'nomor_kamar' => 'required|string',
            'level_kamar' => 'required|in:VIP,Reguler,Ekonomi'
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return response()->json($kamar);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar, $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return response()->json(null);
    }
}
