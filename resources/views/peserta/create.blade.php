@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2>Form Pendaftaran Senam Massal</h2>

            {{-- SWEETALERT2 SUCCESS --}}
            @if (session('success'))
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif

            {{-- SWEETALERT2 ERROR VALIDATION --}}
            @if ($errors->any())
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        html: `
                <ul style="text-align:center; padding-left: 0; list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Tutup'
                    });
                </script>
            @endif


            <form action="{{ route('peserta.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">NIK:</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" required
                        minlength="16" maxlength="16" pattern="\d{16}" title="NIK harus berupa 16 digit angka"
                        value="{{ old('nik') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required
                        value="{{ old('nama') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP:</label>
                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required
                        inputmode="numeric" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        value="{{ old('no_hp') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat:</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror" required max="2010-01-01"
                        value="{{ old('tanggal_lahir') }}">
                    <div class="form-text text-danger">
                        * Peserta harus berusia minimal 15 tahun (lahir sebelum 1 Januari 2010)
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
