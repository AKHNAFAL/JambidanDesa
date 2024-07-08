<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function layananSurat()
    {
        $surat = Surat::paginate(10);

        // Mengambil statistik surat berdasarkan tanggal masuk
        $statistics = Surat::select(DB::raw('DATE(tanggal_masuk) as date'), DB::raw('count(*) as total'))
            ->groupBy(DB::raw('DATE(tanggal_masuk)'))
            ->get();

        // Mengambil data jumlah surat yang masuk setiap bulan
        $monthlyStatistics = DB::table('surat')
            ->select(DB::raw('MONTH(tanggal_masuk) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => $item->month,
                    'total' => $item->total,
                ];
            });

        return view('layanan-surat', compact('surat', 'statistics', 'monthlyStatistics'));
    }

    public function index()
    {
        $surat = Surat::paginate(10);

        // Mengambil statistik surat berdasarkan tanggal masuk pada awal bulan
        $statistics = Surat::select(DB::raw('DATE_FORMAT(tanggal_masuk, "%Y-%m-01") as date'), DB::raw('count(*) as total'))
            ->groupBy(DB::raw('DATE_FORMAT(tanggal_masuk, "%Y-%m-01")'))
            ->orderBy('date')
            ->get();

        // Mengambil data jumlah surat yang masuk setiap bulan
        $monthlyStatistics = DB::table('surat')
            ->select(DB::raw('MONTH(tanggal_masuk) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->orderByRaw('MONTH(tanggal_masuk)')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => $item->month,
                    'total' => $item->total,
                ];
            });

        return view('layanan-surat', compact('surat', 'statistics', 'monthlyStatistics'));
    }
}
