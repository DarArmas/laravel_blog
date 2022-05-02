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
            array('id' => '1', 'menu_id' => NULL, 'nombre' => 'Navegación', 'url' => 'javascript:;', 'orden' => '2', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '2', 'menu_id' => '1', 'nombre' => 'Menu', 'url' => 'menu', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '3', 'menu_id' => NULL, 'nombre' => 'Dashboard', 'url' => 'dashboard', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '4', 'menu_id' => '1', 'nombre' => 'Menu Rol', 'url' => 'menu-rol', 'orden' => '2', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '5', 'menu_id' => NULL, 'nombre' => 'Seguridad', 'url' => 'javascript:;', 'orden' => '3', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '6', 'menu_id' => '5', 'nombre' => 'Rol', 'url' => 'rol', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '7', 'menu_id' => '5', 'nombre' => 'Permiso', 'url' => 'permiso', 'orden' => '2', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '8', 'menu_id' => '5', 'nombre' => 'Permiso Rol', 'url' => 'permiso-rol', 'orden' => '3', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '9', 'menu_id' => NULL, 'nombre' => 'Post', 'url' => 'javascript:;', 'orden' => '4', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '10', 'menu_id' => '9', 'nombre' => 'Categorías', 'url' => 'categoria', 'orden' => '1', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '11', 'menu_id' => '9', 'nombre' => 'Posts', 'url' => 'post', 'orden' => '2', 'icono' => NULL, 'created_at' => '2021-12-29 00:42:47', 'updated_at' => '2021-12-29 00:46:52'),
            array('id' => '12', 'menu_id' => '9', 'nombre' => 'Tags', 'url' => 'tag', 'orden' => '3', 'icono' => NULL, 'created_at' => '2021-12-29 00:46:40', 'updated_at' => '2021-12-29 00:46:52')
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
