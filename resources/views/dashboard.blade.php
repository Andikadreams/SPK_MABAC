@extends('layouts.app')

@section('title', 'Selamat Datang Di Dashboard')

@section('contents')
    <h4 class="text-center">{{ Auth::user()->name }}
    </h4>
    <div class="row justify-content-center">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('kriteria') }}">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tabel Kriteria</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_kriteria }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('alternatif') }}">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-0">Tabel Alternatif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_alternatif }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('nilaialt') }}">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-1">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-0">Tabel Nilai Matrix</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('normalisasi_nilai') }}">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-1">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-0">Tabel Normalisasi</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('hasil_ranking') }}">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-1">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Peringkat Alternatif</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Add iframe for PDF -->
    <div class="row justify-content-center">
        <div class="mb-4 text-center">
            <h3>Jurnal</h3>
            <iframe src="{{ asset('document/11-Article Text-189-2-10-20201129.pdf') }}" width="1100px" height="1100px"></iframe>
        </div>
        <div class="text-center">
            <h3>Perhitungan Excel</h3>
            <iframe src="https://docs.google.com/spreadsheets/d/1Lk3W3ViBMwC99Oj4nh7VQfXjPnnYgrE9/edit?usp=sharing&ouid=107402612490797375028&rtpof=true&sd=true" width="1100px" height="1100px"></iframe>
        </div>
    </div>
@endsection
