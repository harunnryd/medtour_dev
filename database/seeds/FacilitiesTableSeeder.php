<?php

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namespace = 'App\\Models\\';
        $facilities = [
            'medical coordination office',
            'international referral center',
            'airport representative counter',
            'interpreter services',
            'travel and visa services',
            'international referral offices'
        ];

        for ($i = 0; $i < 6; $i++) {
            app($namespace. 'Hospital')->find(rand(1,6))->facilities()->create([
                'name' => $facilities[$i],
            ]);
        }

        $this->command->info('Berhasil menambah seed pada table facilities');
    }
}
