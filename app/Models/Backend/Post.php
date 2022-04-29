<?php

namespace App\Models\Backend;

use App\Models\Backend\Archivo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['usuario_id', 'titulo', 'slug', 'descripcion', 'contenido', 'estado'];

    //un post tiene muchas categorias | una categoria puede tener muchos posts
    public function categoria(){
        return $this->belongsToMany(Categoria::class, 'post_categoria');
    }

    //un post puede tener muchos tags | un tag puede tener muchos posts
    public function tag(){
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function archivo(){
        return $this->morphOne(Archivo::class, 'archivable');
    }
}
