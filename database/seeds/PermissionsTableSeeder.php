<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'browse_news',
                'table_name' => 'news',
                'created_at' => '2019-10-09 01:39:23',
                'updated_at' => '2019-10-09 01:39:23',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'read_news',
                'table_name' => 'news',
                'created_at' => '2019-10-09 01:39:23',
                'updated_at' => '2019-10-09 01:39:23',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'edit_news',
                'table_name' => 'news',
                'created_at' => '2019-10-09 01:39:23',
                'updated_at' => '2019-10-09 01:39:23',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'add_news',
                'table_name' => 'news',
                'created_at' => '2019-10-09 01:39:23',
                'updated_at' => '2019-10-09 01:39:23',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'delete_news',
                'table_name' => 'news',
                'created_at' => '2019-10-09 01:39:23',
                'updated_at' => '2019-10-09 01:39:23',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'browse_messages',
                'table_name' => 'messages',
                'created_at' => '2019-10-09 01:44:20',
                'updated_at' => '2019-10-09 01:44:20',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'read_messages',
                'table_name' => 'messages',
                'created_at' => '2019-10-09 01:44:20',
                'updated_at' => '2019-10-09 01:44:20',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'edit_messages',
                'table_name' => 'messages',
                'created_at' => '2019-10-09 01:44:20',
                'updated_at' => '2019-10-09 01:44:20',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'add_messages',
                'table_name' => 'messages',
                'created_at' => '2019-10-09 01:44:20',
                'updated_at' => '2019-10-09 01:44:20',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'delete_messages',
                'table_name' => 'messages',
                'created_at' => '2019-10-09 01:44:20',
                'updated_at' => '2019-10-09 01:44:20',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'browse_clients',
                'table_name' => 'clients',
                'created_at' => '2019-10-09 02:01:42',
                'updated_at' => '2019-10-09 02:01:42',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'read_clients',
                'table_name' => 'clients',
                'created_at' => '2019-10-09 02:01:42',
                'updated_at' => '2019-10-09 02:01:42',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'edit_clients',
                'table_name' => 'clients',
                'created_at' => '2019-10-09 02:01:42',
                'updated_at' => '2019-10-09 02:01:42',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'add_clients',
                'table_name' => 'clients',
                'created_at' => '2019-10-09 02:01:42',
                'updated_at' => '2019-10-09 02:01:42',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'delete_clients',
                'table_name' => 'clients',
                'created_at' => '2019-10-09 02:01:42',
                'updated_at' => '2019-10-09 02:01:42',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'browse_portofolios',
                'table_name' => 'portofolios',
                'created_at' => '2019-10-09 02:03:40',
                'updated_at' => '2019-10-09 02:03:40',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'read_portofolios',
                'table_name' => 'portofolios',
                'created_at' => '2019-10-09 02:03:40',
                'updated_at' => '2019-10-09 02:03:40',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'edit_portofolios',
                'table_name' => 'portofolios',
                'created_at' => '2019-10-09 02:03:40',
                'updated_at' => '2019-10-09 02:03:40',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'add_portofolios',
                'table_name' => 'portofolios',
                'created_at' => '2019-10-09 02:03:40',
                'updated_at' => '2019-10-09 02:03:40',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'delete_portofolios',
                'table_name' => 'portofolios',
                'created_at' => '2019-10-09 02:03:40',
                'updated_at' => '2019-10-09 02:03:40',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'browse_services',
                'table_name' => 'services',
                'created_at' => '2019-10-09 02:09:57',
                'updated_at' => '2019-10-09 02:09:57',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'read_services',
                'table_name' => 'services',
                'created_at' => '2019-10-09 02:09:57',
                'updated_at' => '2019-10-09 02:09:57',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'edit_services',
                'table_name' => 'services',
                'created_at' => '2019-10-09 02:09:57',
                'updated_at' => '2019-10-09 02:09:57',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'add_services',
                'table_name' => 'services',
                'created_at' => '2019-10-09 02:09:57',
                'updated_at' => '2019-10-09 02:09:57',
            ),
            50 => 
            array (
                'id' => 51,
                'key' => 'delete_services',
                'table_name' => 'services',
                'created_at' => '2019-10-09 02:09:57',
                'updated_at' => '2019-10-09 02:09:57',
            ),
            51 => 
            array (
                'id' => 52,
                'key' => 'browse_products',
                'table_name' => 'products',
                'created_at' => '2019-10-09 02:32:59',
                'updated_at' => '2019-10-09 02:32:59',
            ),
            52 => 
            array (
                'id' => 53,
                'key' => 'read_products',
                'table_name' => 'products',
                'created_at' => '2019-10-09 02:32:59',
                'updated_at' => '2019-10-09 02:32:59',
            ),
            53 => 
            array (
                'id' => 54,
                'key' => 'edit_products',
                'table_name' => 'products',
                'created_at' => '2019-10-09 02:32:59',
                'updated_at' => '2019-10-09 02:32:59',
            ),
            54 => 
            array (
                'id' => 55,
                'key' => 'add_products',
                'table_name' => 'products',
                'created_at' => '2019-10-09 02:32:59',
                'updated_at' => '2019-10-09 02:32:59',
            ),
            55 => 
            array (
                'id' => 56,
                'key' => 'delete_products',
                'table_name' => 'products',
                'created_at' => '2019-10-09 02:32:59',
                'updated_at' => '2019-10-09 02:32:59',
            ),
            56 => 
            array (
                'id' => 57,
                'key' => 'browse_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2019-10-09 02:37:39',
                'updated_at' => '2019-10-09 02:37:39',
            ),
            57 => 
            array (
                'id' => 58,
                'key' => 'read_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2019-10-09 02:37:39',
                'updated_at' => '2019-10-09 02:37:39',
            ),
            58 => 
            array (
                'id' => 59,
                'key' => 'edit_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2019-10-09 02:37:39',
                'updated_at' => '2019-10-09 02:37:39',
            ),
            59 => 
            array (
                'id' => 60,
                'key' => 'add_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2019-10-09 02:37:39',
                'updated_at' => '2019-10-09 02:37:39',
            ),
            60 => 
            array (
                'id' => 61,
                'key' => 'delete_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2019-10-09 02:37:39',
                'updated_at' => '2019-10-09 02:37:39',
            ),
        ));
        
        
    }
}