<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. STATISTIK (Sesuai 3 Kartu di Foto)
        $stats = [
            'total_orders'   => Order::count(),
            // Di foto ada "Orders Selesai", kita ambil yang status_progress = 'done'
            'orders_selesai' => Order::where('status_progress', 'done')->count(),
            'user_terdaftar' => User::count(),
        ];

        // 2. TABEL DATA (Sesuai Kolom di Foto: ID, User, Total, Status, Tanggal)
        $recentOrders = Order::with('user') // Eager load relasi user
            ->latest('created_at')
            ->take(5)
            ->get()
            ->map(function ($order) {
                // Mapping data database ke tampilan
                return [
                    'id'     => '#ORD-' . str_pad($order->id, 4, '0', STR_PAD_LEFT), // Format ID misal #ORD-0001
                    'user'   => $order->user->name ?? 'Guest', // Ambil nama dari relasi id_user
                    'total'  => 'Rp ' . number_format($order->total_price, 0, ',', '.'),
                    'status' => $order->status_progress, // pending, process, done, canceled
                    'date'   => $order->order_date ? date('d M Y', strtotime($order->order_date)) : $order->created_at->format('d M Y'),
                ];
            });

        return view('dashboard', compact('stats', 'recentOrders'));
    }
}
