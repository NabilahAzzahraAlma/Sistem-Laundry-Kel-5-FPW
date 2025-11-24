<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB; // Untuk Transaction
use App\Models\Transaction;
class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua order (Halaman Index)
     */
    public function index()
    {

        // Ambil data order, urutkan dari yang terbaru, dan pakai pagination (10 per halaman)
        // 'with' digunakan agar query lebih ringan (Eager Loading)
        $orders = Order::with('user')->latest('order_date')->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Menampilkan form tambah order baru
     */
    public function create()
    {
        // 1. Ambil data user (customer) untuk dropdown pelanggan
        $users = User::where('role', 'customer')->get();

        // 2. Ambil data services (BAGIAN YANG ANDA MINTA)
        // Kita urutkan 'asc' (A-Z) agar rapi saat muncul di dropdown
        $services = Service::orderBy('category', 'asc')->get();

        // 3. Tampilkan View
        // PENTING: Sesuaikan nama view dengan nama file blade yang Anda buat sebelumnya.
        // Jika file Anda bernama "order.blade.php" (langsung di folder views), gunakan:
        return view('orders.create', compact('users', 'services'));

        // TAPI, jika file Anda ada di folder "resources/views/orders/create.blade.php", gunakan:
        // return view('orders.create', compact('users', 'services'));
    }

    /**
     * Menyimpan order baru ke database
     */
    public function store(Request $request)
    {
       // 1. Validasi Input
        $request->validate([
            'id_user'        => 'required|exists:users,id_user',
            'id_service'     => 'required|exists:services,id_service', // Service dipilih user
            'weight'         => 'required|numeric|min:1', // Berat cucian
            'order_date'     => 'required|date',
            'status_payment' => 'required|in:pending,paid',
        ]);

        // 2. Ambil Harga Service dari Database
        $service = Service::findOrFail($request->id_service);

        // 3. Hitung Total Harga (Berat x Harga per Kg)
        $grandTotal = $request->weight * $service->price_per_kg;

        // 4. Simpan ke Database (Gunakan Transaction biar aman)
        DB::transaction(function () use ($request, $grandTotal, $service) {

            // A. Simpan ke Tabel Orders
            $order = Order::create([
                'id_user'         => $request->id_user,
                'total'           => $grandTotal,
                'status_payment'  => $request->status_payment,
                'status_progress' => 'pending', // Default baru masuk
                'order_date'      => $request->order_date,
            ]);

            // B. Simpan ke Tabel Order Details
            OrderDetail::create([
                'id_order'   => $order->id_order,
                'service_id' => $service->id_service,
                'quantity'   => $request->weight,
                'sub_total'  => $grandTotal,
            ]);
        });

        return redirect()->route('orders.index')->with('success', 'Order baru berhasil dibuat!');
    }

    /**
     * Menampilkan detail order
     */
    public function show($id)
    {
        // Cari order berdasarkan id_order
        $order = Order::with(['user', 'orderDetails'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Menghapus order
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus');
    }
    /**
     * Menampilkan Form Edit Status
     */
    public function edit($id)
    {
        $order = Order::with('user', 'orderDetails.service')->findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    /**
     * Proses Update & Buat Transaksi Otomatis
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi Input
        $request->validate([
            'status_progress' => 'required|in:pending,process,done,canceled',
            'status_payment'  => 'required|in:pending,paid',
            'method_payment'  => 'nullable|string', // Opsional, default CASH nanti
        ]);

        // 2. Ambil Data Order Lama
        $order = Order::findOrFail($id);

        // 3. LOGIKA TRANSAKSI OTOMATIS
        // Cek: Apakah user mengubah ke 'paid' DAN sebelumnya statusnya BELUM 'paid'?
        // Ini untuk mencegah duplikasi transaksi kalau tombol save ditekan berkali-kali.
        if ($request->status_payment == 'paid' && $order->status_payment != 'paid') {

            Transaction::create([
                'id_order'         => $order->id_order,
                'id_user'          => $order->id_user,
                'jumlah_transaksi' => $order->total,
                // Ambil dari form edit, kalau kosong default CASH
                'method_payment'   => $request->method_payment ?? 'CASH',
                'transaksi_date'   => now(),
                'transaksi_status' => 'success'
            ]);
        }

        // 4. Update Status Order
        $order->update([
            'status_progress' => $request->status_progress,
            'status_payment'  => $request->status_payment,
            // Jika status 'done', mungkin mau set tanggal selesai otomatis?
            // 'completed_at' => $request->status_progress == 'done' ? now() : null,
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Status order diperbarui & Transaksi tercatat (jika lunas).');
    }
}
