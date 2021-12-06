<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentGroup extends Model
{
    use HasFactory;
    protected $table = 'order_component';
    protected $fillable = [
        'nama',
        'deskripsi'
    ];
}
