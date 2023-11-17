@extends('layouts.app')

@section('title', 'Nilai Alternatif')

@section('contents')
    @include('sweetalert::alert')

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>
    @endif

    @if (Session::has('info'))
        <div class="alert alert-info">
            {{ Session::get('info') }}
            @php
                Session::forget('info');
            @endphp
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alternatif</h6>
        </div>
        <div class="card-body">
            @if (auth()->user()->level == 'admin')
                <a class="btn btn-success right mb-3" href="{{ route('nilaialt') }}">Tampilkan semua Alternatif</a>
            @endif
            <form class="form-left my-2" method="get" action="{{ route('nilaialt.search') }}">
                <div class="input-group mb-3 col-12 col-sm-8 col-md-6">
                    <input type="text" name="search" class="form-control w-50 d-inline" id="search"
                        placeholder="Masukkan Pencarian">
                    <button type="submit" class="btn btn-primary mb-1">
                        <span class="fa fa-search"></span> Cari
                    </button>
                    <div class="input-group-append">
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Alternatif</th>
                            @foreach ($kriteria as $krit)
                                <td>{{ $krit->kode_kriteria_as_string }}</td>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $item)
                            <tr>
                                <td>{{ $item->kode_alternatif_as_string }}</td>
                                @foreach ($kriteria as $k)
                                    @php    
                                        $nilai = $nilai_alt
                                            ->where('kode_alt', $item->kode_alternatif)
                                            ->where('kode_krit', $k->kode_kriteria)
                                            ->first();
                                    @endphp
                                    <td>{{ $nilai ? $nilai->value : '' }}</td>
                                    
                                @endforeach
                                <td>
                                    <a href="{{ route('nilaialt.create') }}"
                                        class="btn btn-primary create-button"
                                        onclick="confirmationEdit(event)">Tambah</a>
                                    <a href="{{ route('nilaialt.edit', $item->kode_alternatif) }}"
                                        class="btn btn-warning edit-button edit-button"
                                        onclick="confirmationEdit(event)">Edit</a>
                                    <a href="{{ route('nilaialt.destroy', $item->kode_alternatif) }}"
                                        class="btn btn-danger delete-button" onclick="confirmationDel(event)">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-2" width="500px">
                    {{ $nilai_alt->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
