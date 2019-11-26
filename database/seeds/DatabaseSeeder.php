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

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(PortofoliosTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(PortofoliosServicesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductsServicesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
