<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Service;
use App\User;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'e-Voting',
            'image' => '',
            'desc' => '',
            'services' => [
                'Web Development'
            ],
            'users' => [
                'Rafy Aulia Akbar',
                'Bagas Muharom Hanugrah Hidayat'
            ]
        ]];

        foreach ($data as $product) {
            $services = $product['services'];
            $users = $product['users'];

            $product = Product::query()
                ->create(Arr::except($product, ['services', 'users']));
            $product->getServices()
                ->attach(Service::query()
                    ->whereIn('name', $services)
                    ->get());
            $product->getUsers()
                ->attach(User::query()
                    ->whereIn('name', $users)
                    ->get());
        }
    }
}
