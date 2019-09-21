<?php

use Illuminate\Database\Seeder;
use App\Menu;
use App\Head;
use App\Post;
use Faker\Factory;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $data = [
            'Product' => 'mdi mdi-blur-radial',
            'Portofolio' => 'mdi mdi-apps',
            'Custom' => 'mdi mdi-grease-pencil',
            'Log' => 'mdi mdi-library-books',
            'Role' => 'mdi mdi-security',
            'Menu' => 'mdi mdi-menu',
            'User' => 'mdi mdi-account-multiple',
            'Viewer' => 'mdi mdi-magnify',
            'Service' => 'mdi mdi-image-filter-vintage',
            'Post' => 'mdi mdi-newspaper',
            'Client' => 'mdi mdi-account-network',
            'Testimonial' => 'mdi mdi-star'
        ];

        foreach ($data as $name => $for){
            $menu = new Menu();
            $menu->icon = $for;
            $menu->name = $name;
            $menu->route = strtolower($name);
            $menu->desc = $faker->text;
            $menu->save();
        }
    }
}
