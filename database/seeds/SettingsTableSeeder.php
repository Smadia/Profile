<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site.title',
                'display_name' => 'Site Title',
                'value' => 'Smadia',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site.description',
                'display_name' => 'Site Description',
                'value' => 'Smadia consists of professional team which provides development of digital needs. Here, the clients not just built an app, but also advice to build a neat system to solve their problems. The code is clean, and could be easily to maintenance or updating the system.',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Site Logo',
                'value' => 'settings/October2019/x76z2qjKUp6Ltz1Y6UkJ.png',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => 'Admin Background Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => 'Admin Title',
                'value' => 'Smadia',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => 'Admin Description',
                'value' => 'Welcome to SmadAdmin',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'admin.loader',
                'display_name' => 'Admin Loader',
                'value' => 'settings/October2019/BsNs1cq9LLeD3KfKlKUW.png',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'admin.icon_image',
                'display_name' => 'Admin Icon Image',
                'value' => 'settings/October2019/7IHPx23filebJ2mpnDdV.png',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            10 => 
            array (
                'id' => 13,
                'key' => 'site.about_us',
                'display_name' => 'About Us',
                'value' => '<p><span style="font-family: \'Open Sans\', sans-serif; font-size: 18px;">Smadia consists of professional team which provides development of digital needs. Here, the clients not just built an app, but also advice to build a neat system to solve their problems.</span><br style="box-sizing: border-box; font-family: \'Open Sans\', sans-serif; font-size: 18px;" /><br style="box-sizing: border-box; font-family: \'Open Sans\', sans-serif; font-size: 18px;" /><span style="font-family: \'Open Sans\', sans-serif; font-size: 18px;">Smadia always use the recent technologies and frameworks to develop the app. The code is clean, and could be easily to maintenance or update.</span></p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 10,
                'group' => 'Site',
            ),
            11 => 
            array (
                'id' => 14,
                'key' => 'site.tagline',
                'display_name' => 'Tagline',
                'value' => 'IDEAS. SPEED. GROWTH.',
                'details' => NULL,
                'type' => 'text',
                'order' => 7,
                'group' => 'Site',
            ),
            12 => 
            array (
                'id' => 15,
                'key' => 'site.tagline_desc',
                'display_name' => 'Tagline Description',
                'value' => '<p><span style="color: #ffffff;"><span style="font-family: \'Open Sans\', sans-serif; font-size: 16px;">Through the&nbsp;</span><span class="font-weight-bold" style="box-sizing: border-box; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-weight: 700 !important;">ideas</span><span style="font-family: \'Open Sans\', sans-serif; font-size: 16px;">&nbsp;you provide, we are committed to providing our&nbsp;</span><span class="font-weight-bold" style="box-sizing: border-box; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-weight: 700 !important;">speed</span><span style="font-family: \'Open Sans\', sans-serif; font-size: 16px;">&nbsp;in developing resources so that you can&nbsp;</span><span class="font-weight-bold" style="box-sizing: border-box; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-weight: 700 !important;">grow</span><span style="font-family: \'Open Sans\', sans-serif; font-size: 16px;">&nbsp;your business or the potential you are building.</span></span></p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 9,
                'group' => 'Site',
            ),
            13 => 
            array (
                'id' => 16,
                'key' => 'site.typeicon',
                'display_name' => 'Type Icon',
                'value' => 'settings/October2019/vCzGixXAyBxmg2EGr82Y.png',
                'details' => NULL,
                'type' => 'image',
                'order' => 6,
                'group' => 'Site',
            ),
            14 => 
            array (
                'id' => 17,
                'key' => 'site.about_us_min',
                'display_name' => 'About Us Min',
                'value' => '<p><span style="color: #535074; font-family: Montserrat, sans-serif; font-size: 13px;">Smadia consists of professional team which provides development of digital needs. Here, the clients not just built an app, but also advice to build a neat system to solve their problems. The code is clean, and could be easily to maintenance or updating the system.</span></p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 11,
                'group' => 'Site',
            ),
            15 => 
            array (
                'id' => 19,
                'key' => 'site.twitter',
                'display_name' => 'Twitter',
                'value' => '@SmadiaID',
                'details' => NULL,
                'type' => 'text',
                'order' => 12,
                'group' => 'Site',
            ),
            16 => 
            array (
                'id' => 20,
                'key' => 'site.phone',
                'display_name' => 'Phone',
                'value' => '+6289636201616',
                'details' => NULL,
                'type' => 'text',
                'order' => 13,
                'group' => 'Site',
            ),
            17 => 
            array (
                'id' => 21,
                'key' => 'site.instagram',
                'display_name' => 'Instagram',
                'value' => 'https://www.instagram.com/smadia.id/',
                'details' => NULL,
                'type' => 'text',
                'order' => 14,
                'group' => 'Site',
            ),
            18 => 
            array (
                'id' => 22,
                'key' => 'site.email',
                'display_name' => 'Email',
                'value' => 'support@smadia.id',
                'details' => NULL,
                'type' => 'text',
                'order' => 15,
                'group' => 'Site',
            ),
            19 => 
            array (
                'id' => 23,
                'key' => 'site.facebook',
                'display_name' => 'Facebook',
                'value' => 'https://www.facebook.com/smadia.id',
                'details' => NULL,
                'type' => 'text',
                'order' => 16,
                'group' => 'Site',
            ),
            20 => 
            array (
                'id' => 25,
                'key' => 'site.keywords',
            'display_name' => 'Keywords ("|" splitter)',
                'value' => 'Smadia|Smadia Software House|Software House Surabaya|Jasa Web|Jasa Android',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 17,
                'group' => 'Site',
            ),
        ));
        
        
    }
}