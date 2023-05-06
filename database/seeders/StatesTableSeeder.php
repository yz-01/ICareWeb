<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Johor',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kedah',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Kelantan',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'WP Kuala Lumpur',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Melaka',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Negeri Sembilan',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Pahang',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Perak',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Perlis',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Pulau Pinang',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'WP Putrajaya',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Sabah',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Sarawak',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Selangor',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Terengganu',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'WP Labuan',
                'created_at' => '2022-07-20 14:13:24',
                'updated_at' => '2022-07-20 14:13:24',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}