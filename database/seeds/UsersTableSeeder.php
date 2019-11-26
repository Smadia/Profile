<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin Smadia',
                'email' => 'admin@smadia.id',
                'avatar' => 'users/October2019/Ne1YeLEG88QYhgmRwzfh.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$vp/jVX2CLUFvtRfAYf8hdetiRav/PeJJIrD1FPyCnh3NS6vcE0MIW',
                'remember_token' => '612iax7FXgIfIE1EehuzVdgSxnIim60EwGJ7cUI5BrxyDTqFXZvD1ZVgZMX6',
                'settings' => '{"locale":"en"}',
                'created_at' => '2019-10-09 01:36:48',
                'updated_at' => '2019-10-10 02:34:39',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => NULL,
                'name' => 'Rafy Aulia Akbar',
                'email' => 'rafyakbar@smadia.id',
                'avatar' => 'users/October2019/8wf5a2bYBoLyDmy5XLvr.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CWTK2GxXdJXfGyYnLpqdgeRhTrWUifsklfijZo6FOUEF0DF.aRMka',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2019-10-09 03:31:21',
                'updated_at' => '2019-10-10 02:25:37',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => NULL,
                'name' => 'Bagas Muharom',
                'email' => 'bagasmuharom@smadia.id',
                'avatar' => 'users/October2019/1csxFVmTXXktuQZMZODc.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$s2H1YJ0GagKDZMU8B0wsC.nlUjy5MukpzManH5fULoFaCBj2BYTv.',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2019-10-09 03:33:42',
                'updated_at' => '2019-10-10 02:25:24',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => NULL,
                'name' => 'Muhammad Iskandar Java',
                'email' => 'javaiskandar@smadia.id',
                'avatar' => 'users/October2019/MjLY6V2wEdsxynm9CB6W.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$GHKibw9YN.MTnfRseLorIOfUbMZhSQUqNRdC/VBB9zqjgzyzhhNay',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2019-10-09 03:34:22',
                'updated_at' => '2019-10-10 02:25:08',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => NULL,
                'name' => 'Ayu Fitri Wulandari',
                'email' => 'ayufitriw@smadia.id',
                'avatar' => 'users/October2019/j3lOTbWs5RBHNMfrqfhs.jpeg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$c1gW7SEa2g2yvqc1342xGe/sFb3dpjj6tRWQRSak3dBdLhIrrJiaG',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2019-10-09 03:35:08',
                'updated_at' => '2019-10-10 02:19:34',
            ),
        ));
        
        
    }
}