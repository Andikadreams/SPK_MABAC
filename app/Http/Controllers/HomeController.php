<?php

namespace App\Http\Controllers;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Models\Kriteria;
use App\Models\Alternatif;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.app');
    }
    public function homedashboard(){
        $count_kriteria = Kriteria::get()->count();
        $count_alternatif = Alternatif::get()->count();
        return view('dashboard', compact('count_kriteria', 'count_alternatif'));
    }
}
