<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Menu;
use Illuminate\Support\Facades\DB;

class MenuRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu_rol = array(
            array('menu_id' => '3', 'rol_id' => '1'),
            array('menu_id' => '2', 'rol_id' => '1'),
            array('menu_id' => '1', 'rol_id' => '1'),
            array('menu_id' => '4', 'rol_id' => '1'),
            array('menu_id' => '5', 'rol_id' => '1'),
            array('menu_id' => '6', 'rol_id' => '1'),
            array('menu_id' => '7', 'rol_id' => '1'),
            array('menu_id' => '8', 'rol_id' => '1'),
            array('menu_id' => '9', 'rol_id' => '1'),
            array('menu_id' => '10', 'rol_id' => '1'),
            array('menu_id' => '11', 'rol_id' => '1'),
            array('menu_id' => '12', 'rol_id' => '1')
          );

          DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
          DB::table('menu_rol')->truncate();
          DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
  
          foreach($menu_rol as $item){
              $menu = Menu::find($item['menu_id']);
              $menu->roles()->attach($item['rol_id']);
          }
          
    }
}
