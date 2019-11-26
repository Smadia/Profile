<?php

use Illuminate\Database\Seeder;

class PortofoliosServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portofolios_services')->delete();
        
        \DB::table('portofolios_services')->insert(array (
            0 => 
            array (
                'portofolio_id' => 1,
                'service_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'portofolio_id' => 2,
                'service_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'portofolio_id' => 5,
                'service_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'portofolio_id' => 6,
                'service_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'portofolio_id' => 7,
                'service_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'portofolio_id' => 7,
                'service_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'portofolio_id' => 7,
                'service_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}