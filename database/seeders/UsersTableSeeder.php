<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Isep Lutpi Nur',
                'email' => 'iseplutpinur7@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DsI7ChQu4aIwEwc0CTlCnO66pBuIukicAIA/oIKwHD4AIGzIHmHZO',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'active' => '1',
                'created_at' => NULL,
                'updated_at' => '2022-08-28 20:49:57',
            ),
            1 => 
            array (
                'id' => '3',
                'name' => 'Dadan S',
                'email' => 'dadan@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$p2M7fsSA8v6yVBk7injXWe07gkHiB7YowX.9a80m/XqmOoBXm7tX2',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'active' => '1',
                'created_at' => '2023-01-22 17:16:25',
                'updated_at' => '2023-01-22 17:16:25',
            ),
        ));
        
        
    }
}