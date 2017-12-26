<?php

use Illuminate\Database\Seeder;

class PracticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namespace = 'App\\Models\\';

        for ($i = 1; $i <= 6; $i++) {
            app($namespace. 'Doctor')->find($i)->practices()->sync([rand(1,6), rand(1,6)]);
        }

        $this->command->info('Berhasil menambah seed pada table practices');
    }
}
