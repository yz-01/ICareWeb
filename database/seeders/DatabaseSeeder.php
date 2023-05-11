<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(NursesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
    }
}
