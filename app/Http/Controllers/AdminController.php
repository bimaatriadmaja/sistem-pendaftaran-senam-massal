<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Pastikan route ini pakai middleware auth di web.php agar hanya admin yang login bisa akses
    public function dashboard(Request $request)
{
    $query = Peserta::query();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nik', 'like', "%{$search}%")
              ->orWhere('nama', 'like', "%{$search}%")
              ->orWhere('no_hp', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%");
        });
    }

    $pesertas = $query->orderBy('created_at', 'asc')->paginate(10)->withQueryString();

    return view('admin.dashboard', compact('pesertas'));
}

public function showChangePasswordForm()
{
    return view('admin.change-password');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    if (!Hash::check($request->current_password, auth()->user()->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah.']);
    }

    auth()->user()->update([
        'password' => Hash::make($request->new_password),
    ]);

    return redirect()->route('dashboard')->with('success', 'Password berhasil diubah.');
}


}
