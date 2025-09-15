@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2>Ubah Password Admin</h2>

            {{-- SweetAlert Success --}}
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

            <form action="{{ route('password.change') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Password Lama:</label>
                    <div class="input-group">
                        <input type="password" name="current_password"
                            class="form-control @error('current_password') is-invalid @enderror" required id="current_password">
                        <span class="input-group-text toggle-password" onclick="togglePassword('current_password')">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru:</label>
                    <div class="input-group">
                        <input type="password" name="new_password"
                            class="form-control @error('new_password') is-invalid @enderror" required id="new_password">
                        <span class="input-group-text toggle-password" onclick="togglePassword('new_password')">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                    @error('new_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru:</label>
                    <div class="input-group">
                        <input type="password" name="new_password_confirmation"
                            class="form-control" required id="new_password_confirmation">
                        <span class="input-group-text toggle-password" onclick="togglePassword('new_password_confirmation')">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Password</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Script toggle password --}}
    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>
@endsection
