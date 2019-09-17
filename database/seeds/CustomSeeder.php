<?php

use Illuminate\Database\Seeder;
use App\Custom;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['key' => 'app name', 'type' => Custom::TEXT, 'value' => 'Smadia'],
            ['key' => 'contacts', 'type' => Custom::JSON, 'value' => json_encode([
                ['name' => 'Email', 'icon' => 'mdi mdi-mail-ru', 'value' => 'support@smadia.id'],
                ['name' => 'Instagram', 'icon' => 'mdi mdi-instagram', 'value' => 'smadia.id'],
                ['name' => 'Facebook', 'icon' => 'mdi mdi-facebook-box', 'value' => 'Smadia Official'],
                ['name' => 'Phones', 'icon' => 'mdi mdi-phone-classic', 'value' => [
                    ['name' => 'Febian', 'no' => '+623141493033'],
                    ['name' => 'Ayu', 'no' => '+6289636201616']
                ]]
            ])],
            ['key' => 'normal icon', 'type' => Custom::IMAGE, 'value' => 'icon.img'],
            ['key' => 'type icon', 'type' => Custom::IMAGE, 'value' => 'icon.img'],
            ['key' => 'favicon', 'type' => Custom::IMAGE, 'value' => 'icon.img'],
            ['key' => 'brosure', 'type' => Custom::FILE, 'value' => 'brosure.pdf'],
            ['key' => 'metas', 'type' => Custom::JSON, 'value' => json_encode([
                ['meta' => 'Smadia'],
                ['meta' => 'Smadia Indonesia'],
                ['meta' => 'Software House Surabaya']
            ])],
            ['key' => 'address', 'type' => Custom::TEXT, 'value' => ''],
            ['key' => 'about us', 'type' => Custom::TEXT, 'value' => '']
        ];

        foreach ($data as $custom){
            Custom::query()->create($custom);
        }
    }
}
