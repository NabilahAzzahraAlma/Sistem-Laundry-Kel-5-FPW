<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi'; // Sesuai catatan

    protected $fillable = [
        'id_order',
        'id_user',
        'id_service', // Opsional
        'jumlah_transaksi',
        'method_payment',
        'transaksi_date',
        'transaksi_status',
    ];

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    // Relasi ke User (Pembayar)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
