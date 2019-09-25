<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CustomSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(RoleMenuSeeder::class);
        $this->call(UserMenuSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PortofolioSeeder::class);
        $this->call(TestimonialSeeder::class);
    }
}
