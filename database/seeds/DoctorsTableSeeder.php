<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namespace = 'App\\Models\\';
        $faker     = app(Faker\Factory::class)->create();
        $gender    = ['l', 'p'];

        for ($i = 0; $i < 6; $i++) {
            $entity = app($namespace. 'Entity')->create([
                'photo'   => str_random(6). '.jpg',
                'address' => $faker->address,
                'contact' => '0896697'. rand(1,9). '6'. rand(100,199),
                'city_id' => rand(1,6),
            ]);

            $name = $faker->name;

            $entity->doctor()->create([
                'name'      => $name,
                'gender'    => $gender[rand(0,1)],
                'entity_id' => rand(1,6),
            ]);
        }

        $this->command->info('Berhasil menambah seed pada table entities dan doctors');
    }
}
