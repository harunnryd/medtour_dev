<?php

use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            'Dokter Kulit', 'Dokter Kandungan', 'Dokter Spesialis Anak',
            'Dokter Gigi', 'Ahli Tulang', 'Bedah Umum',
            'Dokter Umum', 'Dokter Mata', 'Ahli Gizi',
            'Bedah Saraf', 'physiotherapists', 'podiatrists',
            'prosthodontists','psychiatrists', 'psychologists',
            'pulmonologists','radiologists', 'rheumatologists',
        ];

        $namespace = 'App\\Models\\';

        foreach ($specializations as $specialization) {
            $spec = app($namespace. 'Specialization')->create([
                'type' => $specialization,
            ]);

            $spec->doctors()->sync([rand(1, 6), rand(1, 6)]);
        }

        $this->command->info('Berhasil menambah seed pada table specializations');
    }
}
