<?php

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = [
            'rs. ananda',
            'rs. mecab',
            'rs. kero',
            'rs. rumes',
            'rs. etep',
            'rs. lebmas oji'
        ];

        $namespace = 'App\\Models\\';
        $faker = app('Faker\Factory')->create();

        for ($i = 0; $i < 6 ; $i++) {
            $entity = app($namespace. 'Entity')->create([
                'photo' => str_random(6). '.jpg',
                'address' => $faker->address,
                'contact' => '02188'. rand(100,900). rand(100,200),
                'city_id' => rand(1,6),
            ]);

            $name = $hospitals[$i];

            $entity->hospital()->create([
                'name' => $name,
                'beds' => rand(50, 250),
                'inpatients' => rand(50, 250),
                'outpatients' => rand(50, 250),
            ]);
        }

        $this->command->info('Berhasil menambah seed pada table hospitals');
    }
}
