<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(DegreesTableSeeder::class);
        $this->call(CareersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
