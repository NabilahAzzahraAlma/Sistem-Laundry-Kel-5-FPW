<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil data transaksi beserta relasi order dan user
        $transaksis = Transaction::with(['order', 'user'])
                        ->latest('transaksi_date')
                        ->paginate(10);

        // Hitung total pemasukan
        $totalPemasukan = Transaction::sum('jumlah_transaksi');

        return view('transaksis.index', compact('transaksis', 'totalPemasukan'));
    }

    // Biasanya Transaksi dibuat OTOMATIS saat Order status_payment berubah jadi 'paid'.
    // Tapi kalau mau manual create, bisa ditambahkan function create/store disini.
}
