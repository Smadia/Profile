<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'Rafy Aulia Akbar',
            'email' => 'rafyakbar@smadia.id',
            'password' => bcrypt('secret123')
        ], [
            'name' => 'Bagas Muharom Hanugrah Hidayat',
            'email' => 'bagasmuharom@smadia.id',
            'password' => bcrypt('secret123')
        ], [
            'name' => 'Muhammad Iskandar Java',
            'email' => 'javaiskandar@smadia.id',
            'password' => bcrypt('secret123')
        ], [
            'name' => 'Febian Fitra Maulana',
            'email' => 'febianmaulana@smadia.id',
            'password' => bcrypt('secret123')
        ], [
            'name' => 'Ayu Fitri Wulandari',
            'email' => 'ayufitriw@smadia.id',
            'password' => bcrypt('secret123')
        ]];

        foreach ($data as $user){
            User::query()->create($user);
        }
    }
}
