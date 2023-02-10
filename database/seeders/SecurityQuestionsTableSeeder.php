<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SecurityQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('security_questions')->delete();
        
        \DB::table('security_questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'What is your favourite color?',
                'created_at' => '2023-02-10 18:22:38',
                'updated_at' => '2023-02-10 18:22:39',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'What is your mother’s birth place?',
                'created_at' => '2023-02-10 18:22:40',
                'updated_at' => '2023-02-10 18:22:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'What is your first pet’s name?',
                'created_at' => '2023-02-10 18:22:41',
                'updated_at' => '2023-02-10 18:22:41',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Who is your favourite teacher?',
                'created_at' => '2023-02-10 18:22:41',
                'updated_at' => '2023-02-10 18:22:41',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Who is your favourite city?',
                'created_at' => '2023-02-10 18:22:42',
                'updated_at' => '2023-02-10 18:22:42',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'What is your father’s favourite color?',
                'created_at' => '2023-02-10 18:22:42',
                'updated_at' => '2023-02-10 18:22:42',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'What is your mother’s shoe size?',
                'created_at' => '2023-02-10 18:22:43',
                'updated_at' => '2023-02-10 18:22:43',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'What is your husband/wife’s favourite song?',
                'created_at' => '2023-02-10 18:22:43',
                'updated_at' => '2023-02-10 18:22:43',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Who is your favourite singer?',
                'created_at' => '2023-02-10 18:22:44',
                'updated_at' => '2023-02-10 18:22:44',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'What is your favourite food?',
                'created_at' => '2023-02-10 18:22:44',
                'updated_at' => '2023-02-10 18:22:44',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}