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
                'username' => 'superdoctor',
                'name' => 'Head of Doctors',
                'email' => 'teyyoongzhun@gmail.com',
                'password' => '$2y$10$I98ZKOiKXXMXHsN1IgDttuflLxXRvy9swaoFdsP5XuuxTRThweySu',
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}