<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminComplaintController extends Controller
{

    // Tampilkan semua komplain dari semua user
    public function index()
    {
        $complaints = Complaint::with('user')
            ->latest()
            ->get();

        return view('admin.complaints.index', compact('complaints'));
    }

    // Detail satu komplain (opsional, kalau mau ada halaman detail)
    public function show(Complaint $complaint)
    {
        $complaint->load('user');

        return view('admin.complaints.show', compact('complaint'));
    }

    // Ubah status komplain (pending -> proses / selesai)
    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai',
        ]);

        $complaint->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status komplain berhasil diperbarui.');
    }
}
