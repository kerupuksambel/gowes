<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'biaya_servis',
        'status', 
        'bukti_transfer',
        'resi',
        'durasi',
        'is_diantar',
    ];
}
