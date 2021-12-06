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
        'biaya_rakit',
        'status', 
        'bukti_transfer',
        'resi',
        'durasi',
        'is_dirakit',
    ];

    public function components()
    {
        return $this->hasMany(OrderComponent::class, 'order_id', 'id');
    }
}
