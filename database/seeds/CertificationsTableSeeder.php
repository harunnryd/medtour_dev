<?php

use Illuminate\Database\Seeder;

class CertificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $certifications = [
            'master rba midtour',
            'master sonen medtir',
            'master jabuk samir',
            'master tuseb had',
            'master sokap yarb',
            'master aspinx'
        ];

        $namespace = 'App\\Models\\';

        for ($i = 1; $i < 6; $i++) {
            app($namespace. 'Doctor')->find($i)->certifications()->create([
                'name' => $certifications[$i],
            ]);
        }

        $this->command->info('Berhasil menambah seed pada table certifications');

    }
}
