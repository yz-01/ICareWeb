<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patients')->delete();
        
        \DB::table('patients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'P00001',
                'branch_id' => 1,
                'username' => 'patient1',
                'name' => 'Patient 1',
                'email' => 'patient1@gmail.com',
                'nurse_call_application_id' => 1,
                'password' => '$2y$10$JJLxXs.PhZ7M2thDH8xttOZbK/sOGAZPBTEebCY5KIuPUp0OTd/W6',
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}