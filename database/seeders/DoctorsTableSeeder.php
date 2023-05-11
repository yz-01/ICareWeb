<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctors')->delete();
        
        \DB::table('doctors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'D00001',
                'branch_id' => 1,
                'username' => 'doctor1',
                'name' => 'Doctor 1',
                'email' => 'doctor1@gmail.com',
                'area_of_experise' => 'Cardiology',
                'password' => '$2y$10$JJLxXs.PhZ7M2thDH8xttOZbK/sOGAZPBTEebCY5KIuPUp0OTd/W6',
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}