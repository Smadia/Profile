<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_roles')->delete();
        
        \DB::table('user_roles')->insert(array (
            0 => 
            array (
                'user_id' => 2,
                'role_id' => 2,
            ),
            1 => 
            array (
                'user_id' => 3,
                'role_id' => 3,
            ),
            2 => 
            array (
                'user_id' => 4,
                'role_id' => 4,
            ),
            3 => 
            array (
                'user_id' => 5,
                'role_id' => 5,
            ),
        ));
        
        
    }
}