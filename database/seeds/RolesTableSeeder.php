<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namespace = 'App\\Models\\';
        $has = ['admin', 'doctor', 'user'];
        $accessable = [
            ['create' => 1, 'read' => 1, 'update' => 1, 'delete' => 1],
            ['create' => 1, 'read' => 1, 'update' => 1, 'delete' => 0],
            ['create' => 0, 'read' => 1, 'update' => 0, 'delete' => 0],
        ];

        for ($i = 0; $i < count($has); $i++) {
            $role = app($namespace. 'Role')->create(['has' => $has[$i]]);
            $role->accessright()->create($accessable[$i]);
        }

        $this->command->info('Berhasil menambah seed pada table role dan accessright');
    }
}
