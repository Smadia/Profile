<?php

use Illuminate\Database\Seeder;

class PortofoliosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portofolios')->delete();
        
        \DB::table('portofolios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'client_id' => 1,
                'name' => 'Lembaga Sertifikasi Profesi',
                'image' => 'portofolios/October2019/jsvEu186QzhUgibWzd1v.png',
                'description' => '<p><span style="font-family: \'Open Sans\', sans-serif; font-size: 18px;">This application, will be used by students, LSP admins, LSP Certification Section, and assessors. The flow starts when a student registers an account and verifies the account. Furthermore, students can register for certification which will then be verified by the admin and the LSP Certification Section. Next, students are asked to do a self-assessment. When a student passes the self-assessment, the process can proceed to the assessment by the assessor followed by confirmation of the assessment. If the student later passes, the admin can issue a certificate. The application is also able to generate files required for certification.</span></p>',
                'created_at' => '2019-10-09 02:25:21',
                'updated_at' => '2019-10-10 02:33:07',
            ),
            1 => 
            array (
                'id' => 2,
                'client_id' => 2,
                'name' => 'e-Layanan Madiun',
                'image' => 'portofolios/October2019/JFToE9Go2WSa5YZUD0Wo.png',
                'description' => '<p><span style="font-family: \'Open Sans\', sans-serif; font-size: 18px; text-align: right;">This application makes it easy for people who want to process population services such as print electronic IDs, birth certificate, etc. People no longer need to queue up at the service office going forward and spend a lot of time. This application was inaugurated by the City of Madiun dispendukcapil. The community can simply access via mobile devices or computers from anywhere. Service is enough from the grip just by accessing the website <a title="pemburu.madiunkota.go.id" href="pemburu.madiunkota.go.id" target="_blank" rel="noopener">pemburu.madiunkota.go.id</a>.</span></p>',
                'created_at' => '2019-10-09 05:12:27',
                'updated_at' => '2019-10-10 02:32:44',
            ),
            2 => 
            array (
                'id' => 5,
                'client_id' => 5,
                'name' => 'PMW UNESA',
                'image' => 'portofolios/October2019/AMkmpyrTqBFvEA36wFjj.png',
                'description' => '<p>PMW UNESA</p>',
                'created_at' => '2019-10-09 05:14:34',
                'updated_at' => '2019-10-10 02:32:17',
            ),
            3 => 
            array (
                'id' => 6,
                'client_id' => 6,
                'name' => 'e-Bebaslab FT UNESA',
                'image' => 'portofolios/October2019/d2ADlYl64PK6Zhu7ovgk.png',
                'description' => '<p>e-Bebaslab FT UNESA</p>',
                'created_at' => '2019-10-09 05:18:06',
                'updated_at' => '2019-10-10 02:32:01',
            ),
            4 => 
            array (
                'id' => 7,
                'client_id' => 5,
                'name' => 'AI Drone Racing',
                'image' => 'portofolios/October2019/WpUwPfxxPkBBnbq1JeIA.png',
                'description' => '<p><span style="box-sizing: border-box; font-weight: bolder; font-family: \'Open Sans\', sans-serif; font-size: 18px;">AI Drone Racing</span><span style="font-family: \'Open Sans\', sans-serif; font-size: 18px;">&nbsp;is a game that was built from research on the implementation of machine learning to create behavior in the enemy. Here the player will face the enemy with intelligence created by a computer machine.</span></p>',
                'created_at' => '2019-10-09 05:23:40',
                'updated_at' => '2019-10-10 02:31:44',
            ),
        ));
        
        
    }
}