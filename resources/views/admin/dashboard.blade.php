@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Selamat datang, Admin!</h1>
        <p>Anda berhasil login.</p>

        <div class="card mt-4">
    <div class="card-header text-center">
        <h4 class="fw-bold mb-3 mt-3">DAFTAR PESERTA</h4>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6"> {{-- Responsive width --}}
                <form action="{{ route('dashboard') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari NIK, Nama, No HP, Alamat..." 
                            value="{{ request('search') }}" 
                            autocomplete="off"
                        >
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

            <div class="card-body p-0">
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
                <div class="table-responsive"> {{-- container scroll horizontal --}}
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>NIK</th> {{-- Tambah kolom NIK --}}
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                                <th>Tgl Lahir</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesertas as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration + ($pesertas->currentPage() - 1) * $pesertas->perPage() }}</td>
                                    <td>{{ $peserta->nik }}</td> {{-- Tampilkan NIK --}}
                                    <td>{{ $peserta->nama }}</td>
                                    <td>{{ $peserta->no_hp }}</td>
                                    <td>{{ $peserta->alamat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('d M Y') }}</td>
                                    <td>{{ $peserta->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-sm btn-primary"
                                            title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data peserta belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 px-3">
                        {{ $pesertas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data peserta akan dihapus secara permanen.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
