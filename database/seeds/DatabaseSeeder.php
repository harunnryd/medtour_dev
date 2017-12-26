<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(CertificationsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(HospitalsTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(PracticesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(TreatmentsTableSeeder::class);
    }
}
