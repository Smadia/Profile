<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'LSP UNESA',
                'image' => 'clients/October2019/t3FuR0d44TpoTSUX6waO.png',
                'description' => '<p>Lembaga Sertifikasi Universitas Negeri Surabaya</p>',
                'created_at' => '2019-10-09 02:29:19',
                'updated_at' => '2019-10-10 02:30:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'PEMKOT Madiun',
                'image' => 'clients/October2019/PJAjjthuMO0gcg58TIEj.png',
                'description' => NULL,
                'created_at' => '2019-10-09 02:44:36',
                'updated_at' => '2019-10-10 02:30:34',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Muria Karya Interior',
                'image' => 'clients/October2019/VxnJzu48ECyHsgkioaxN.png',
                'description' => NULL,
                'created_at' => '2019-10-09 02:45:10',
                'updated_at' => '2019-10-10 02:30:23',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sinar Media Display',
                'image' => 'clients/October2019/ahPA2xzIGtVDPVS9SmiS.png',
                'description' => NULL,
                'created_at' => '2019-10-09 02:45:48',
                'updated_at' => '2019-10-10 02:30:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Universitas Negeri Surabaya',
                'image' => 'clients/October2019/sTcIEMU8MXN674k4wSyn.jpg',
                'description' => NULL,
                'created_at' => '2019-10-09 02:48:27',
                'updated_at' => '2019-10-10 02:29:42',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'FT UNESA',
                'image' => 'clients/October2019/i3RYTaoLQPnyqc2hnlyU.jpg',
                'description' => NULL,
                'created_at' => '2019-10-09 05:26:41',
                'updated_at' => '2019-10-10 02:29:29',
            ),
        ));
        
        
    }
}