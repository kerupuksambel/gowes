<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $table = 'components';
    protected $fillable = [
        'group_id',
        'nama',
        'gambar',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function group(){
        return $this->belongsTo(ComponentGroup::class, 'group_id', 'id');
    }
}
