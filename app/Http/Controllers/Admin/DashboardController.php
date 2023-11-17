<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Models\Permohonan;


class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();

        // $masyarakat = Masyarakat::all()->count();

        // $menunggu = Permohonan::where('status', '0')->get()->count();

        // $proses = Permohonan::where('status', 'proses')->get()->count();

        // $selesai = Permohonan::where('status', 'selesai')->get()->count();

        return view('Admin.Dashboard.index');
    }
}
