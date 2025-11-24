<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // --- PASTIKAN INI ADA ---
    protected $primaryKey = 'id_order';
    // Masukkan semua kolom agar bisa diisi (Mass Assignment)
    protected $fillable = [
        'id_user',
        'id_service',
        'weight',
        'total_price',
        'status_progress', // pending, process, done, canceled
        'status_payment',
        'order_date',
    ];

    // Relasi ke tabel Users
    // Parameter ke-2 'id_user' wajib ada karena nama kolommu bukan 'user_id'
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke tabel Services (Jika ada model Service)
    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
