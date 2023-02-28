<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'A00001',
                'username' => 'superadmin',
                'name' => 'Ocean Labs Admin',
                'email' => 'superadmin@superadmin.com',
                'password' => '$2y$10$I98ZKOiKXXMXHsN1IgDttuflLxXRvy9swaoFdsP5XuuxTRThweySu',
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'A00002',
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$0N5dWstflEohfKolLVoUKeVyZDZSajpMAC35VlA2pgeKuC/LSPm1K',
                'status' => 1,
                'created_at' => '2023-02-28 11:53:33',
                'updated_at' => '2023-02-28 11:54:32',
            ),
        ));
        
        
    }
}