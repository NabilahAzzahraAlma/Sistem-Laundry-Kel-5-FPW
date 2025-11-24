<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // --- TAMBAHKAN INI ---
    protected $table = 'services'; // Pastikan nama tabel benar
    protected $primaryKey = 'id_service'; // Sesuaikan jika PK anda id_service atau id
    // ---------------------


       protected $fillable = [
       'id_user',
    'category',
    'price_per_kg',
    'duration',
    'min_order',
    'unit',
    'parfume_name'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
