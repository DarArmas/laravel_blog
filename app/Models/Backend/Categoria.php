<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $guarded = [];

    public function post(){
        return $this->belongsToMany(Post::class, 'post_categoria');
    }
}
