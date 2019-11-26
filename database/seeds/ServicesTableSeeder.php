<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Web Development',
                'image' => '<div class="icon" style="background: #fceef3;"><i class="ion-ios-world-outline" style="color: #ff689b;"></i></div>',
                'description' => 'In this internet age, the web is a flexible platform for your mobility needs',
                'created_at' => '2019-10-09 02:13:39',
                'updated_at' => '2019-10-10 03:16:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mobile Development',
                'image' => '<div class="icon" style="background: #fff0da;"><i class="ion-android-phone-portrait" style="color: #e98e06;"></i></div>',
                'description' => 'With mobile apps, make access to your business easier in the grip of your hand',
                'created_at' => '2019-10-09 02:18:58',
                'updated_at' => '2019-10-10 03:39:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Game Development',
                'image' => '<div class="icon" style="background: #e6fdfc;"><i class="ion-ios-game-controller-b-outline" style="color: #3fcdc7;"></i></div>',
                'description' => 'Are you ready to build a game? Come on, give us your idea and we\'re ready to make it happen',
                'created_at' => '2019-10-09 02:19:30',
                'updated_at' => '2019-10-10 03:30:09',
            ),
            3 => 
            array (
                'id' => 4,
            'name' => 'AI (Artificial Intelligence)',
                'image' => '<div class="icon" style="background: #eafde7;"><i class="ion-ios-analytics-outline" style="color:#41cf2e;"></i></div>',
                'description' => 'Still using the old way? Artificial Intelligence will make your device smarter',
                'created_at' => '2019-10-09 02:19:58',
                'updated_at' => '2019-10-10 03:18:08',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Desktop Apps',
                'image' => '<div class="icon" style="background: #e1eeff;"><i class="ion-ios-monitor-outline" style="color: #2282ff;"></i></div>',
                'description' => 'This type of application is perfect for those of you who are always connected to a desktop computer',
                'created_at' => '2019-10-09 02:20:18',
                'updated_at' => '2019-10-10 03:31:52',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Design',
                'image' => '<div class="icon" style="background: #ecebff;"><i class="ion-android-color-palette" style="color: #8660fe;"></i></div>',
                'description' => 'Need something fresher? The design we provide will amaze you',
                'created_at' => '2019-10-09 02:20:39',
                'updated_at' => '2019-10-10 03:45:26',
            ),
        ));
        
        
    }
}