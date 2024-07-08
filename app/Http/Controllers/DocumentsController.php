<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DocumentsController extends Controller
{
    public function index()
    {
        // Ambil semua dokumen dari database
        $documents = Documents::all();
        $documents_pending = Documents::where('status', 'Pending')->get();
        $documents_approved = Documents::where('status', 'Approved')->get();
        $documents_rejected = Documents::where('status', 'Rejected')->get();
        
        // Kirim data dokumen ke view 'penyetujuan'
        return view('penyetujuan', compact('documents', 'documents_pending', 'documents_approved', 'documents_rejected'));
    }

    public function updateStatus(Request $request, $id)
    {
        $id = Documents::find($id);
        if ($id) {
            $id->status = $request->status;
            $id->save();
        }

        return redirect()->route('penyetujuan.index');
    }
}
