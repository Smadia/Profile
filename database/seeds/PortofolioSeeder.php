<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Client;
use App\Portofolio;
use Faker\Factory;
use Illuminate\Support\Arr;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $data = [[
            'image' => 'portofolio.img',
            'name' => 'Company Profile Rental Multimedia',
            'desc' => $faker->text,
            'demo' => 'http://rentalmultimedia.net/',
            'services' => [
                'Web Development'
            ], 'client_id' => 3
        ], [
            'image' => 'portofolio.img',
            'name' => 'Company Profile Interior',
            'desc' => $faker->text,
            'demo' => 'https://www.muriakaryainterior.com/',
            'services' => [
                'Web Development'
            ], 'client_id' => 4
        ], [
            'image' => 'portofolio.img',
            'name' => 'Program Mahasiswa Wirausaha UNESA',
            'desc' => $faker->text,
            'demo' => 'http://pmw.unesa.ac.id/pmw/public/login',
            'services' => [
                'Web Development'
            ], 'client_id' => 1
        ], [
            'image' => 'portofolio.img',
            'name' => 'Warehouse',
            'desc' => $faker->text,
            'demo' => null,
            'services' => [
                'Web Development'
            ], 'client_id' => 5
        ], [
            'image' => 'portofolio.img',
            'name' => 'e-BebasLab Fakultas Teknik UNESA',
            'desc' => $faker->text,
            'demo' => null,
            'services' => [
                'Web Development'
            ], 'client_id' => 1
        ], [
            'image' => 'portofolio.img',
            'name' => 'Izi Mart',
            'desc' => $faker->text,
            'demo' => null,
            'services' => [
                'Mobile Development'
            ], 'client_id' => 6
        ], [
            'image' => 'portofolio.img',
            'name' => 'Lembaga Sertifikasi Profesi UNESA',
            'desc' => $faker->text,
            'demo' => 'http://lsp.unesa.ac.id/',
            'services' => [
                'Web Development'
            ], 'client_id' => 1
        ], [
            'image' => 'portofolio.img',
            'name' => 'Pemburu (Kepengurusan KTP, Akta dll) Pemerintah Kota Madiun',
            'desc' => $faker->text,
            'demo' => 'http://pemburu.madiunkota.go.id/',
            'services' => [
                'Web Development'
            ], 'client_id' => 2
        ], [
            'image' => 'portofolio.img',
            'name' => 'e-Voting Pemira Fakultas Ekonomi UNESA',
            'desc' => $faker->text,
            'demo' => null,
            'services' => [
                'Web Development'
            ], 'client_id' => 1
        ], [
            'image' => 'portofolio.img',
            'name' => 'e-Voting Pemira Fakultas Ilmu Sosial & Hukum UNESA',
            'desc' => $faker->text,
            'demo' => null,
            'services' => [
                'Web Development'
            ], 'client_id' => 1
        ], [
            'image' => 'portofolio.img',
            'name' => 'e-Voting Pemira Fakultas Teknik UNESA',
            'desc' => $faker->text,
            'demo' => null,
            'services' => [
                'Web Development'
            ], 'client_id' => 1
        ]];

        foreach ($data as $portofolio){
            $services = $portofolio['services'];

            $portofolio = Portofolio::query()
                ->create(Arr::except($portofolio, ['services']));
            $portofolio->getServices()
                ->attach(Service::query()
                    ->whereIn('name', $services)
                    ->get());
        }
    }
}
