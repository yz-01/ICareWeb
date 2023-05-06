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
                'username' => 'patient',
                'name' => 'Tey Yoong Zhun',
                'email' => 'teyyoongzhun@gmail.com',
                'password' => '$2y$10$I98ZKOiKXXMXHsN1IgDttuflLxXRvy9swaoFdsP5XuuxTRThweySu',
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}