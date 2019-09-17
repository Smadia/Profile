<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Menu;

class RoleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all();
        $roles = Role::all();

        foreach ($menus as $menu){
            foreach ($roles as $role){
                $menu->getRoles()
                    ->attach($role);
            }
        }
    }
}
