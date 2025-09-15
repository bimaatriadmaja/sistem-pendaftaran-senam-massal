@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2>Form Pendaftaran Senam Massal</h2>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('peserta.store') }}" method="POST">
                @csrf

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
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP:</label>
                    <input type="number" name="no_hp" class="form-control" required
                        inputmode="numeric" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat:</label>
                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required max="2010-01-01">
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
