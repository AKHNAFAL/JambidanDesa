<?php

namespace App\Http\Controllers;

use App\Models\Kependudukan;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    public function index()
    {
        $kependudukan = Kependudukan::paginate(10);

        // Statistik berdasarkan umur
        $umurStatistik = Kependudukan::selectRaw('umur, COUNT(*) as count')
            ->groupBy('umur')
            ->get();

        // Statistik berdasarkan pekerjaan
        $pekerjaanStatistik = Kependudukan::selectRaw('pekerjaan, COUNT(*) as count')
            ->groupBy('pekerjaan')
            ->get();

        // Statistik berdasarkan jenis kelamin
        $jenisKelaminStatistik = Kependudukan::selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->get();

        return view('kependudukan', compact('kependudukan', 'umurStatistik', 'pekerjaanStatistik', 'jenisKelaminStatistik'));
    }
}
