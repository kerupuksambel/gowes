<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentGroup extends Model
{
    use HasFactory;
    protected $table = 'component_group';
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function members(){
        return $this->hasMany(Component::class, 'group_id', 'id');
    }
}
