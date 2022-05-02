<?php

namespace App\Console\Commands;

use App\Models\Usuario;
use Illuminate\Console\Command;
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
 
            $usuario = $this->crearUsuarioSuperAdmin();
            //Relacionarlo
            $usuario->roles()->attach(1);
            $this->line('El usuario administrador se instalaron correctamente');
    }


    private function crearUsuarioSuperAdmin(){
        return Usuario::create([
            'nombre' => 'blog_admin',
            'email' => 'darnell@test.com',
            'password' => Hash::make('pass1234'),
            'estado' => 1
        ]);
    }
}
