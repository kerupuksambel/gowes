<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderComponent extends Model
{
    use HasFactory;
    protected $table = 'order_component';
    protected $fillable = [
        'order_id',
        'component_id'
    ];
}
