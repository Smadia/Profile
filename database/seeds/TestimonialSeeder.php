<?php

use Illuminate\Database\Seeder;
use App\Testimonial;
use App\Portofolio;
use Faker\Factory;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        foreach (Portofolio::all() as $portofolio){
            Testimonial::query()
                ->create([
                    'image' => 'image.jpg',
                    'name' => $faker->unique()->name,
                    'jobtitle' => $faker->jobTitle,
                    'content' => $faker->unique()->text,
                    'portofolio_id' => $portofolio->id
                ]);
        }
    }
}
