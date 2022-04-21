<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permiso';
    protected $guarded = [];

    public function roles(){
        return $this->belongsToMany(Rol::class, 'permiso_rol');
    }
}