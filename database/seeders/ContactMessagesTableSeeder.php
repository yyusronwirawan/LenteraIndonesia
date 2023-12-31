<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactMessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_messages')->delete();
        
        \DB::table('contact_messages')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Isep Lutpi Nur',
                'email' => 'iseplutpinur7@gmail.com',
                'message' => 'Tes via hp',
                'status' => NULL,
                'created_at' => '2022-08-21 15:49:29',
                'updated_at' => '2022-08-21 15:49:29',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'CANDIDO CRUICKSHANK JR.',
                'email' => 'admin@mail.com',
                'message' => 'a',
                'status' => NULL,
                'created_at' => '2023-01-15 15:21:24',
                'updated_at' => '2023-01-15 15:21:24',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Testing',
                'email' => 'admin@mail.com',
                'message' => '123',
                'status' => NULL,
                'created_at' => '2023-01-15 15:24:45',
                'updated_at' => '2023-01-15 15:24:45',
            ),
        ));
        
        
    }
}