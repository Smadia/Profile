<?php

use Illuminate\Database\Seeder;
use App\Menu;
use App\User;

class UserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $menus = Menu::all();

        foreach ($users as $user){
            foreach ($menus as $menu){
                $user->getMenus()
                    ->attach($menu);
            }
        }
    }
}
