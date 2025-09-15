@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Cek Data Pendaftaran Kamu</h3>

    {{-- FORM --}}
    <form method="POST" action="{{ route('peserta.checkData') }}">
        @csrf
        <div class="mb-3">
            <label for="nik" class="form-label">Masukkan NIK</label>
            <input 
                type="text" 
                class="form-control" 
                id="nik" 
                name="nik" 
                value="{{ old('nik') }}" 
                required 
                minlength="16" 
                maxlength="16" 
                pattern="\d{16}" 
                title="NIK harus berupa 16 digit angka"
            >
        </div>
        {{-- ALERT ERROR --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <button type="submit" class="btn btn-primary">Cek Data</button>
    </form>

    {{-- DATA DITEMUKAN --}}
    @if(isset($peserta))
        <hr>
        <div class="alert alert-success mt-4">
            <h5>Data Ditemukan:</h5>
            <ul class="mb-0">
                <li><strong>Nama:</strong> {{ $peserta->nama }}</li>
                <li><strong>No. HP:</strong> {{ $peserta->no_hp }}</li>
                <li><strong>Alamat:</strong> {{ $peserta->alamat }}</li>
                <li><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('d M Y') }}</li>
                <li><strong>NIK:</strong> {{ $peserta->nik }}</li>
            </ul>
        </div>
    @endif
</div>
@endsection
