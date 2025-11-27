<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    
    // Tampilkan daftar komplain milik user yang login
    public function index()
    {
        if(Auth::user()->role == 'admin') {
            return $this->indexAdmin();
        }


        $complaints = Complaint::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('complaints.index', compact('complaints'));
    }

    public function indexAdmin()
    {
        $complaints = Complaint::latest()
            ->get();

        return view('complaints.index', compact('complaints'));
    }

    // Form tambah komplain
    public function create()
    {
        return view('complaints.create');
    }

    // Simpan komplain baru
    public function store(Request $request)
    {
        $request->validate([
            'subject'   => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Complaint::create([
            'user_id' => Auth::id(),
            'subject'   => $request->subject,
            'message' => $request->message,
            'status'  => 'pending', // selalu pending saat dibuat
        ]);

        return redirect()->route('complaints.index')
            ->with('success', 'Komplain berhasil dikirim. Status saat ini: pending.');
    }

    // Form edit komplain (hanya kalau status masih pending / proses, terserah aturanmu)
    public function edit(Complaint $complaint)
    {
        // Pastikan hanya pemiliknya yang bisa edit
        $this->authorizeComplaint($complaint);

        return view('complaints.edit', compact('complaint'));
    }

    // Update komplain
    public function update(Request $request, Complaint $complaint)
    {
        $this->authorizeComplaint($complaint);

        $request->validate([
            'subject'   => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Kalau mau batasi hanya bisa edit saat status pending, bisa tambahkan:
        // if ($complaint->status !== 'pending') { ... }

        $complaint->update([
            'subject'   => $request->subject,
            'message' => $request->message,
            // status sengaja tidak diubah di sisi user
        ]);

        return redirect()->route('complaints.index')
            ->with('success', 'Komplain berhasil diperbarui.');
    }

    // Hapus komplain
    public function destroy(Complaint $complaint)
    {
        $this->authorizeComplaint($complaint);

        $complaint->delete();

        return redirect()->route('complaints.index')
            ->with('success', 'Komplain berhasil dihapus.');
    }

    // Helper: pastikan komplain milik user
    protected function authorizeComplaint(Complaint $complaint)
    {
        if ($complaint->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Tidak punya akses ke komplain ini.');
        }
    }
}
