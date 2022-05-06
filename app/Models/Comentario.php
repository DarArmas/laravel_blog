<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentario';
    protected $guarded = [];

    public function usuario(){
      return $this->belongsTo(Usuario::class, 'usuario_id');
    }


    public function hijo(){
       return $this->hasMany(Comentario::class, 'comentario_id');
    }
}

