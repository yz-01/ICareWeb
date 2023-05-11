<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('branches')->delete();
        
        \DB::table('branches')->insert(array (
            0 => 
            array (
                'id' => 1,
                'state_id' => 1,
                'city_id' => '21',
                'country_id' => 131,
                'name' => 'Johor Bahru Branch',
                'address1' => '1, Jalan Johor Bahru 10',
                'address2' => 'Taman Johor Bahru',
                'postal_code' => '123456',
                'phone' => '0123456789',
                'email' => 'JohorBahruBranch@gmail.com',
                'logo' => null,
                'thumbnail_logo' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}