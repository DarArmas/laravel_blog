<?php

namespace App\Models\Backend;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
      protected $table = 'tag';
    protected $guarded = [];

    public function post(){
      return $this->belongsToMany(Post::class, 'post_tag');
  }

    public static function setTag($tags){
      $data = [];
      if(is_array($tags)){
        foreach($tags as $tag){
          if(is_numeric($tag)){
            $data[] = $tag;
          }else{
            $tag = ucfirst(trim($tag)); 
            $slug = Str::slug($tag, '-');
            $data[] = tag::firstOrCreate([
              'nombre' => $tag,
              'slug' => $slug
            ])->id;
          }
        }
      }
      return $data;
    }
    
}
