<?php

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2019-10-09 01:36:14',
                'updated_at' => '2019-10-09 01:36:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'news',
                'slug' => 'news',
                'display_name_singular' => 'News',
                'display_name_plural' => 'News',
                'icon' => NULL,
                'model_name' => 'App\\News',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2019-10-09 01:39:23',
                'updated_at' => '2019-10-09 05:29:15',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'messages',
                'slug' => 'messages',
                'display_name_singular' => 'Message',
                'display_name_plural' => 'Messages',
                'icon' => 'voyager-mail',
                'model_name' => 'App\\Message',
                'policy_name' => 'App\\Policies\\MessagePolicy',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2019-10-09 01:44:20',
                'updated_at' => '2019-10-09 04:38:54',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'clients',
                'slug' => 'clients',
                'display_name_singular' => 'Client',
                'display_name_plural' => 'Clients',
                'icon' => 'voyager-bubble-hear',
                'model_name' => 'App\\Client',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2019-10-09 02:01:42',
                'updated_at' => '2019-10-09 02:01:42',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'portofolios',
                'slug' => 'portofolios',
                'display_name_singular' => 'Portofolio',
                'display_name_plural' => 'Portofolios',
                'icon' => 'voyager-wand',
                'model_name' => 'App\\Portofolio',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2019-10-09 02:03:39',
                'updated_at' => '2019-10-09 05:21:29',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'services',
                'slug' => 'services',
                'display_name_singular' => 'Service',
                'display_name_plural' => 'Services',
                'icon' => 'voyager-lightbulb',
                'model_name' => 'App\\Service',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2019-10-09 02:09:57',
                'updated_at' => '2019-10-09 05:09:59',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'products',
                'slug' => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural' => 'Products',
                'icon' => 'voyager-bag',
                'model_name' => 'App\\Product',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2019-10-09 02:32:59',
                'updated_at' => '2019-10-09 02:34:34',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'testimonials',
                'slug' => 'testimonials',
                'display_name_singular' => 'Testimonial',
                'display_name_plural' => 'Testimonials',
                'icon' => 'voyager-star',
                'model_name' => 'App\\Testimonial',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2019-10-09 02:37:39',
                'updated_at' => '2019-10-09 05:30:13',
            ),
        ));
        
        
    }
}