<?php

namespace App\Http\Controllers;

use App\Models\NilaiAlt;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNilaiAltRequest;
use App\Http\Requests\UpdateNilaiAltRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class NilaiAltController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::with('nilaiAlts')->get();
        $kriteria = Kriteria::get();
        $nilai_alt = NilaiAlt::all();
        // foreach ($kriteria as $kriteria) {
        // $nilaiAltsKriteria = NilaiAlt::where('kode_krit', $kriteria->kode_kriteria)->get();
        
        // }
        // $maxValue = $nilaiAltsKriteria->max('value');
        // $minValue = $nilaiAltsKriteria->min('value');
        return view ('alt_criteria.index',compact('nilai_alt','alternatif','kriteria') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nilai_alt = NilaiAlt::get();
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
		return view('alt_criteria.form',compact('nilai_alt','alternatif','kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiAltRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = NilaiAlt::get();
        $kriteria = Kriteria::get();
        $request->validate([
            'value*' => 'required',]);
        if($validate){
            
        }
        foreach ($kriteria as $Kriteria) {
            $nilaiAlt = new nilaiAlt;

            $nilaiAlt->kode_alt = $request->get('kode_alt');
            $nilaiAlt->kode_krit = $request->get('kode_krit' . $Kriteria->kode_kriteria);
            $nilaiAlt->value = $request->get('value' . $Kriteria->kode_kriteria);
            $nilaiAlt->save();
        }
            return redirect()->route('nilaialt')->with('success', 'Berhasil Menambah Nilai Alternatif!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiAlt  $nilaiAlt
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiAlt  $nilaiAlt
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiAltRequest  $request
     * @param  \App\Models\NilaiAlt  $nilaiAlt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_alt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiAlt  $nilaiAlt
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_alt)
    {
        try {
            // Cari dan hapus semua nilai untuk alternatif tertentu
            NilaiAlt::where('kode_alt', $kode_alt)->delete();
    
            return redirect()->route('nilaialt')->with('success', 'Berhasil Menghapus Semua Nilai Alternatif');
        } catch (\Exception $e) {
            return redirect()->route('nilaialt')->with('error', 'Gagal menghapus nilai alternatif. Error: ' . $e->getMessage());
        }
    }
}
