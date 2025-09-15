<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class AdminController extends Controller
{
    // Pastikan route ini pakai middleware auth di web.php agar hanya admin yang login bisa akses
    public function dashboard()
    {
        $pesertas = Peserta::orderBy('created_at', 'asc') // Urut dari yang paling lama
                ->paginate(10);

        return view('admin.dashboard', compact('pesertas'));
    }

}
