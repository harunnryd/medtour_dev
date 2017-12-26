<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            'indonesia',
            'chinese',
            'spanish',
            'english',
            'arabic',
            'hindi',
        ];

        $namespace = 'App\\Models\\';

        for ($i = 1; $i < 6; $i++) {
            $language = app($namespace. 'Language')->create([
                'spoken' => $languages[$i],
            ]);

            $language->doctors()->sync([rand(1,6), rand(1,6), rand(1,6)]);
        }

        $this->command->info('Berhasil menambah seed pada table languages');
    }
}
