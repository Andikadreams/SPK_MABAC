<?php

namespace App\Http\Controllers;

use App\Models\NilaiAlt;
use App\Models\Alternatif;
use App\Models\Kriteria;
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
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
        $nilai_alt = NilaiAlt::paginate(5);
        return view ('alt_criteria.index',compact('nilai_alt','alternatif','kriteria') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
		return view('alt_criteria.form', ['alt' => $alternatif], ['kriteria' => $kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiAltRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNilaiAltRequest $request)
    {
        $data = [
            'id_alternatif' => $request->id_alternatif,
            'id_kriteria' => $request->id_kriteria,
            'value' => $request->value,
        ];
        NilaiAlt::create($data);
            return redirect()->route('nilaialt')->with('success', 'Berhasil Menambah Nilai Kriteria!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiAlt  $nilaiAlt
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiAlt $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiAlt  $nilaiAlt
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiAlt $id)
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
    public function update(UpdateNilaiAltRequest $request, NilaiAlt $nilaiAlt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiAlt  $nilaiAlt
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiAlt $id)
    {
        //
    }
}
