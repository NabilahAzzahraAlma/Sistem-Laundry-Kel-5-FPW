<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
class AdminController extends Controller
{
    // Method untuk menampilkan dashboard admin
    public function index()
    {
        // 1. Ambil Data Statistik
        $stats = [
            'total_orders'   => Order::count(),
            'orders_selesai' => Order::where('status_progress', 'done')->count(),
            'user_terdaftar' => User::count(),
        ];

        // 2. Ambil Data Order Terbaru (Variable ini yang tadi hilang)
        $recentOrders = Order::with('user')
            ->latest('order_date')
            ->take(5)
            ->get();

        // 3. Kirim data ke View 'admin.dashboard'
        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
