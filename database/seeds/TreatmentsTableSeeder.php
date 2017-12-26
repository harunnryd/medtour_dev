<?php

use Illuminate\Database\Seeder;

class TreatmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $treatments = [
            'USG',
            'X Ray',
            'Check up',
            'Abortion',
            'Operation'
        ];

        $namespace = 'App\\Models\\';

        foreach ($treatments as $treatment) {
            $spec = app($namespace. 'Treatment')->create([
                'name' => $treatment,
            ]);
        }

        $this->command->info('Berhasil menambah seed pada table treatments');
    }
}
