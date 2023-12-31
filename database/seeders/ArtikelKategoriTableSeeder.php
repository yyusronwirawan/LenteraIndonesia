<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtikelKategoriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('artikel_kategori')->delete();
        
        \DB::table('artikel_kategori')->insert(array (
            0 => 
            array (
                'id' => '2',
                'nama' => 'Edukasi',
                'slug' => 'edukasi',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2022-04-13 19:11:56',
                'updated_at' => '2022-04-13 19:11:56',
            ),
            1 => 
            array (
                'id' => '3',
                'nama' => 'Inspirasi',
                'slug' => 'inspirasi',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2022-04-17 14:46:50',
                'updated_at' => '2022-04-17 14:46:50',
            ),
            2 => 
            array (
                'id' => '4',
                'nama' => 'Hari Besar Nasional',
                'slug' => 'hari-besar-nasional',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2022-04-17 15:13:33',
                'updated_at' => '2022-04-17 15:13:33',
            ),
            3 => 
            array (
                'id' => '5',
                'nama' => 'Hari Internasional',
                'slug' => 'hari-internasional',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2022-04-25 04:15:09',
                'updated_at' => '2022-04-25 04:15:09',
            ),
            4 => 
            array (
                'id' => '6',
                'nama' => 'Berita',
                'slug' => 'berita',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2022-04-25 12:46:55',
                'updated_at' => '2022-04-25 12:46:55',
            ),
            5 => 
            array (
                'id' => '7',
                'nama' => 'rental',
                'slug' => 'rental',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2023-01-23 11:39:44',
                'updated_at' => '2023-01-23 11:39:44',
            ),
            6 => 
            array (
                'id' => '8',
                'nama' => 'tanaman hias',
                'slug' => 'tanaman-hias',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2023-01-23 11:39:44',
                'updated_at' => '2023-01-23 11:39:44',
            ),
            7 => 
            array (
                'id' => '13',
                'nama' => 'catatan kita',
                'slug' => 'catatan-kita',
                'foto' => NULL,
                'status' => '1',
                'created_at' => '2023-01-25 10:13:25',
                'updated_at' => '2023-01-25 10:13:25',
            ),
        ));
        
        
    }
}