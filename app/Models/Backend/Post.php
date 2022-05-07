<?php

namespace App\Models\Backend;

use App\Models\Usuario;
use App\Models\Comentario;
use App\Models\Backend\Archivo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['usuario_id', 'titulo', 'slug', 'descripcion', 'contenido', 'estado', 'video'];

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

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function comentario(){
        return $this->hasMany(Comentario::class, 'post_id');
    }

     /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActivo($query)
    {
        $query->where('estado', true);
    }
}
