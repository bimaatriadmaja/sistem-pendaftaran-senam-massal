@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2 class="mb-4">Cek Data Pendaftaran Kamu</h2>

            {{-- SweetAlert Error --}}
            @if (session('error'))
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: '{{ session('error') }}',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Tutup'
                    });
                </script>
            @endif

            {{-- Form Cek NIK --}}
            <form method="POST" action="{{ route('peserta.checkData') }}">
                @csrf
                <div class="mb-3">
                    <label for="nik" class="form-label">Masukkan NIK:</label>
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
                    <div class="form-text text-muted">
                        Pastikan NIK yang dimasukkan sesuai dengan saat mendaftar.
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cek Data</button>
                </div>
            </form>

            {{-- Jika data ditemukan --}}
            @if(isset($peserta))
                <hr>
                <div class="alert alert-success mt-4">
                    <h5 class="mb-3 text-success"><i class="bi bi-check-circle-fill"></i> Data Ditemukan</h5>
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
    </div>
@endsection
