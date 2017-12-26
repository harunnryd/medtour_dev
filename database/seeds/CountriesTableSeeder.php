<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namespace = 'App\\Models\\';

        $countries = [
            'indonesia',
            'thailand',
            'singapura',
            'vietnam',
            'filipina',
            'malaysia',
        ];

        $provinces = [
            'jawa barat',
            'bangkok',
            'cunui',
            'hanoi',
            'munyui',
            'mandan'
        ];

        $cities = [
            'bekasi',
            'momoi',
            'mingui',
            'cingul',
            'komo',
            'munuk',
        ];

        $id = [1, 2, 3, 4, 5, 6];


        for ($i = 0; $i < count($countries); $i++) {
            $country = app($namespace. 'Country')->create([
                'name' => $countries[$i],
            ]);

            $country->provinces()->create([
                'name' => $provinces[$i],
            ]);

            app($namespace. 'Province')->find($id[$i])->cities()->create([
                'name' => $cities[$i],
            ]);
        }

        $this->command->info('Berhasil menambah seed pada table countries, provinces, cities');
    }
}
