<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $roles = Role::all();

        foreach ($users as $user){
            foreach ($roles as $role){
                $user->getRoles()
                    ->attach($role);
            }
        }
    }
}
