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
                'name' => 'Johor Branch',
                'address1' => '1, Jalan Johor 10',
                'address2' => 'Taman Johor',
                'postal_code' => '123456',
                'phone' => '0123456789',
                'email' => 'JohorBranch@gmail.com',
                'logo' => null,
                'thumbnail_logo' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            1 => 
            array (
                'id' => 2,
                'state_id' => 2,
                'city_id' => '21',
                'country_id' => 131,
                'name' => 'Kedah Branch',
                'address1' => '1, Jalan Kedah 10',
                'address2' => 'Taman Kedah',
                'postal_code' => '123456',
                'phone' => '0123456789',
                'email' => 'KedahBranch@gmail.com',
                'logo' => null,
                'thumbnail_logo' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            2 => 
            array (
                'id' => 3,
                'state_id' => 3,
                'city_id' => '21',
                'country_id' => 131,
                'name' => 'Kelantan Branch',
                'address1' => '1, Jalan Kelantan 10',
                'address2' => 'Taman Kelantan',
                'postal_code' => '123456',
                'phone' => '0123456789',
                'email' => 'KelantanBranch@gmail.com',
                'logo' => null,
                'thumbnail_logo' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            3 => 
            array (
                'id' => 4,
                'state_id' => 4,
                'city_id' => '21',
                'country_id' => 131,
                'name' => 'WP Kuala Lumpur Branch',
                'address1' => '1, Jalan WP Kuala Lumpur 10',
                'address2' => 'Taman WP Kuala Lumpur',
                'postal_code' => '123456',
                'phone' => '0123456789',
                'email' => 'WPKualaLumpurBranch@gmail.com',
                'logo' => null,
                'thumbnail_logo' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            4 => 
            array (
                'id' => 5,
                'state_id' => 5,
                'city_id' => '21',
                'country_id' => 131,
                'name' => 'Melaka Branch',
                'address1' => '1, Jalan Melaka 10',
                'address2' => 'Taman Melaka',
                'postal_code' => '123456',
                'phone' => '0123456789',
                'email' => 'MelakaBranch@gmail.com',
                'logo' => null,
                'thumbnail_logo' => null,
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}