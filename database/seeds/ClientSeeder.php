<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Universitas Negeri Surabaya', 'image' => 'client.jpg'], // 0
            ['name' => 'Pemerintah Kota Madiun', 'image' => 'client.jpg'],      // 1
            ['name' => 'Sinar Media Display', 'image' => 'client.jpg'],         // 2
            ['name' => 'Muria Karya', 'image' => 'client.jpg'],                 // 3
            ['name' => 'Adiguna Tupperware', 'image' => 'client.jpg'],          // 4
            ['name' => 'Izi', 'image' => 'client.jpg']                          // 5
        ];

        foreach ($data as $client){
            Client::query()->create($client);
        }
    }
}
