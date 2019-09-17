<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Web Development',
            'Mobile Development',
            'Dekstop Development',
            'Game Development',
            'AI Research',
            'Design'
        ];

        foreach ($data as $service){
            Service::query()->create(['name' => $service, 'image' => $service.'.jpg']);
        }
    }
}
