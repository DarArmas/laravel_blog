<?php

namespace App\Models;

use App\Models\Backend\Rol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    protected $table = 'usuario';

      /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Rol::class, 'usuario_rol', 'usuario_id', 'rol_id'); //los usuarios tienen una relacion con Roles a traves de la tabla puente usuarios_roles
    }
}
