@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2>Edit Data Peserta Senam Massal</h2>

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

            <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NIK:</label>
                    <input 
                        type="text" 
                        name="nik" 
                        class="form-control" 
                        required 
                        minlength="16" 
                        maxlength="16" 
                        pattern="\d{16}" 
                        title="NIK harus berupa 16 digit angka"
                        value="{{ old('nik', $peserta->nik) }}"
                    >
                    @error('nik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama:</label>
                    <input 
                        type="text" 
                        name="nama" 
                        class="form-control" 
                        required 
                        value="{{ old('nama', $peserta->nama) }}"
                    >
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP:</label>
                    <input 
                        type="number" 
                        name="no_hp" 
                        class="form-control" 
                        required 
                        inputmode="numeric" 
                        min="0" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        value="{{ old('no_hp', $peserta->no_hp) }}"
                    >
                    @error('no_hp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat:</label>
                    <textarea 
                        name="alamat" 
                        class="form-control" 
                        rows="3" 
                        required
                    >{{ old('alamat', $peserta->alamat) }}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir:</label>
                    <input 
                        type="date" 
                        name="tanggal_lahir" 
                        class="form-control" 
                        required 
                        max="2010-01-01"
                        value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('Y-m-d')) }}"
                    >
                    <div class="form-text text-danger">
                        * Peserta harus berusia minimal 15 tahun (lahir sebelum 1 Januari 2010)
                    </div>
                    @error('tanggal_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
