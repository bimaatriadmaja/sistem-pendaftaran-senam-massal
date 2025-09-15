@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Selamat datang, Admin!</h1>
    <p>Anda berhasil login.</p>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Daftar Peserta</h4>
        </div>
        <div class="card-body p-0">
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
                                <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" class="d-inline" 
                                    onsubmit="return confirm('Yakin ingin menghapus peserta ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
@endsection
