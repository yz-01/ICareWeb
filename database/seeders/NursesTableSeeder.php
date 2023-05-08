<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nurses')->delete();
        
        \DB::table('nurses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'N00001',
                'username' => 'supernurse',
                'name' => 'Head of Nurses',
                'email' => 'teyyoongzhun@gmail.com',
                'password' => '$2y$10$JJLxXs.PhZ7M2thDH8xttOZbK/sOGAZPBTEebCY5KIuPUp0OTd/W6',
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}