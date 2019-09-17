<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Admin', 'Superadmin'
        ];

        foreach ($data as $role){
            Role::query()
                ->create(['name' => $role]);
        }
    }
}
