<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lead AI Engineer',
                'display_name' => 'Lead AI Engineer',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 03:26:07',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Lead Programmer',
                'display_name' => 'Lead Programmer',
                'created_at' => '2019-10-09 03:26:25',
                'updated_at' => '2019-10-09 03:26:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Lead Game Developer',
                'display_name' => 'Lead Game Developer',
                'created_at' => '2019-10-09 03:26:39',
                'updated_at' => '2019-10-09 03:26:39',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Lead UI/UX Designer',
                'display_name' => 'Lead UI/UX Designer',
                'created_at' => '2019-10-09 03:26:51',
                'updated_at' => '2019-10-09 03:26:51',
            ),
        ));
        
        
    }
}