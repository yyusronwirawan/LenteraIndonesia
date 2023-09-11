<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactListTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_list')->delete();
        
        \DB::table('contact_list')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Location',
                'icon' => 'fas fa-map-marker-alt',
                'url' => 'https://g.page/Green-Education-Bandung?share',
                'order' => '1',
                'keterangan' => 'Jl. Intan raya no. 4 Sadang Serang - Bandung<br> Jawa Barat 40134, Indonesia.',
                'status' => '1',
                'created_at' => '2022-08-21 08:34:56',
                'updated_at' => '2022-11-12 03:23:06',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Telepon',
                'icon' => 'fas fa-phone',
                'url' => 'tel:+6281322728628',
                'order' => '2',
                'keterangan' => '+6281322728628',
                'status' => '1',
                'created_at' => '2022-08-21 08:35:23',
                'updated_at' => '2022-11-12 03:26:57',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Email',
                'icon' => 'fas fa-envelope',
                'url' => 'mailto:infogeb@greeneducationbdg.com',
                'order' => '3',
                'keterangan' => 'infogeb@greeneducationbdg.com',
                'status' => '1',
                'created_at' => '2022-08-21 08:35:47',
                'updated_at' => '2022-11-12 03:26:38',
            ),
        ));
        
        
    }
}