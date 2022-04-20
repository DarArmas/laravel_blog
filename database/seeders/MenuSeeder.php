<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Menu;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = array(
            array('id' => '1', 'menu_id' => NULL, 'nombre' => 'Navegacion', 'url' => 'javascript:;', 'orden' => '1', 'icono' => NULL, 'created_at' => '2022-03-29 00:20:41', 'updated_at' => '2022-04-20 19:43:06'),
            array('id' => '3', 'menu_id' => '1', 'nombre' => 'Menu', 'url' => 'menu', 'orden' => '1', 'icono' => NULL, 'created_at' => '2022-03-29 00:27:26', 'updated_at' => '2022-04-20 19:43:06'),
            array('id' => '4', 'menu_id' => NULL, 'nombre' => 'Dashboard', 'url' => 'dashboard', 'orden' => '2', 'icono' => NULL, 'created_at' => '2022-03-29 00:27:50', 'updated_at' => '2022-04-20 19:43:06'),
            array('id' => '5', 'menu_id' => '1', 'nombre' => 'Menu Rol', 'url' => 'menu-rol', 'orden' => '2', 'icono' => NULL, 'created_at' => '2022-04-20 19:31:31', 'updated_at' => '2022-04-20 19:43:06')
        );

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('menu')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        foreach ($menu as $item) {
            Menu::create([
                'id' => $item['id'],
                'menu_id' => $item['menu_id'],
                'nombre' => $item['nombre'],
                'url' => $item['url'],
                'orden' => $item['orden'],
                'icono' => $item['icono']
            ]);
        }
    }
}
