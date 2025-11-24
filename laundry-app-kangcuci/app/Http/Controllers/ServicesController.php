<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Jangan lupa import Auth

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with('user')->latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    // 1. Menampilkan Form
    public function create()
    {
        return view('services.create');
    }

    // 2. Menyimpan Data (Action dari Form)
    public function store(Request $request)
    {
        // Validasi
    $request->validate([
        'category'     => 'required|string|max:255',
        'price_per_kg' => 'required|numeric',
        'duration'     => 'required|string',
        'min_order'    => 'required|string',
        'unit'         => 'required|string',
    ]);

    // Simpan
    Service::create([
        'id_user'      => Auth::id() ?? 1,
        'category'     => $request->category,
        'price_per_kg' => $request->price_per_kg,
        'duration'     => $request->duration,
        'min_order'    => $request->min_order,
        'unit'         => $request->unit,
        'parfume_name' => $request->parfume_name,
    ]);

    return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan!');
}
    // Method edit, update, destroy nanti menyusul...
     public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus');
    }
}
