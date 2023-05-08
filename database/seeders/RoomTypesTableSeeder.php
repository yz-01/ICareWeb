<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_types')->delete();
        
        \DB::table('room_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Single Room',
                'max_number' => '1',
                'image' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Twin Room',
                'max_number' => '2',
                'image' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Triple Room',
                'max_number' => '3',
                'image' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Four Room',
                'max_number' => '4',
                'image' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}