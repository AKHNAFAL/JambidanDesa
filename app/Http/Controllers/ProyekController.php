<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $proyek_tertunda = Proyek::where('status', 'Tertunda')->get();
        $proyek_selesai = Proyek::where('status', 'Selesai')->get();
        $proyek_proses = Proyek::where('status', 'Dalam Proses')->get();

        $proyek_tertunda_count = Proyek::where('status', 'Tertunda')->count();
        $proyek_selesai_count = Proyek::where('status', 'Selesai')->count();
        $proyek_proses_count = Proyek::where('status', 'Dalam Proses')->count();
        
        $proyek = Proyek::all();

        return view('proyek', compact('proyek_tertunda', 'proyek', 'proyek_selesai', 'proyek_proses', 'proyek_proses_count', 'proyek_selesai_count', 'proyek_tertunda_count', 'proyek_proses_count'));
    }

    // Menampilkan detail proyek berdasarkan ID
    public function show($id)
    {
        $proyek = Proyek::find($id);
        if (!$proyek) {
            return response()->json(['message' => 'Proyek tidak ditemukan'], 404);
        }
        return response()->json($proyek);
    }

    // Menambahkan proyek baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:Dalam Proses,Selesai,Tertunda',
            'persentase_penyelesaian' => 'required|numeric|min:0|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $proyek = Proyek::create($validatedData);

        return response()->json($proyek, 201);
    }

    // Mengupdate proyek yang sudah ada
    public function update(Request $request, $id)
    {
        $proyek = Proyek::find($id);
        if (!$proyek) {
            return response()->json(['message' => 'Proyek tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:Dalam Proses,Selesai,Tertunda',
            'persentase_penyelesaian' => 'required|numeric|min:0|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $proyek->update($validatedData);

        return response()->json($proyek);
    }

    // Menghapus proyek
    public function destroy($id)
    {
        $proyek = Proyek::find($id);
        if (!$proyek) {
            return response()->json(['message' => 'Proyek tidak ditemukan'], 404);
        }

        $proyek->delete();

        return response()->json(['message' => 'Proyek berhasil dihapus']);
    }
}
