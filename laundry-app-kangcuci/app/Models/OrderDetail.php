<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    // --- PASTIKAN INI ADA ---
    protected $primaryKey = 'id_order_detail';

    protected $fillable = [
        'id_order',
        'service_id',
        'quantity',
        'sub_total',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
