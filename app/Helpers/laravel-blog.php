<?php

use App\Models\Backend\Permiso;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

if(!function_exists('isSuperAdmin')){
    function isSuperAdmin(){
        return Session::get('rol_slug') == 'superadmin';
        
    }
}

if(!function_exists('canUser')){
    function canUser($permiso, $redirect = true){
        if(Session::get('rol_slug') == 'superadmin'){
            return true;
        }else{
            $rol_id = Session::get('rol_id');
            
            // $permisos = Cache::tags('Permiso')->rememberForever("Permiso.rolid.$rol_id", function() use($rol_id){
            //     return Permiso::whereHas('roles', function(Builder $query) use($rol_id){
            //         $query->where('rol_id', $rol_id);//obtener el rol_id de la sesion
            //     })->get()->pluck('slug')->toArray();
            // });

            $permisos = Permiso::whereHas('roles', function(Builder $query) use($rol_id){
                $query->where('rol_id', $rol_id);//obtener el rol_id de la sesion
            })->get()->pluck('slug')->toArray();
               
            if(!in_array($permiso, $permisos)){
                if($redirect){
                    abort(403, 'No tienes permisos para entrar a este modulo');
                }else{
                    return false;
                }
            }
            return true;
        }
        
    }
}


