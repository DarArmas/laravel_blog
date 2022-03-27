<?php

namespace App\Console\Commands;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel_blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando ejecuta el instalador incial de proyecto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!$this->verificar()){
            $rol = $this->crearRolSuperAdmin();
            $usuario = $this->crearUsuarioSuperAdmin();
            //Relacionarlo
            $usuario->roles()->attach($rol);
            $this->line('El rol y el usuario administrador se instalaron correctamente');
        }else{
            $this->error('No se puede ejecutar el instalador porque ya hay un rol privado');
        }
     
    }

    private function verificar(){
        return Rol::find(1); //si no existe regresa null = false | si existe regresa true
    }

    private function crearRolSuperAdmin(){
        $rol = "Super Administrador";
        return Rol::create([
            'nombre' => $rol,
            'slug' => Str::slug($rol, '_')
        ]);

    }

    private function crearUsuarioSuperAdmin(){
        return Usuario::create([
            'nombre' => 'blog_admin',
            'email' => 'darnellsanchez2011@gmail.com',
            'password' => Hash::make('pass1234'),
            'estado' => 1
        ]);
    }
}
