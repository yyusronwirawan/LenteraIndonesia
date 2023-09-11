<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukKategorisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produk_kategoris')->delete();
        
        \DB::table('produk_kategoris')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Kategori A',
                'slug' => 'kategori-a',
                'foto' => '20230127222416.jpg',
                'keterangan' => 'Kategori Keterangan A',
                'created_at' => '2023-01-27 22:24:16',
                'updated_at' => '2023-01-27 22:24:56',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Kategori B',
                'slug' => 'kategori-b',
                'foto' => '20230127222521.jpg',
                'keterangan' => 'Keterangan Kategori B',
                'created_at' => '2023-01-27 22:25:21',
                'updated_at' => '2023-01-27 22:25:21',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Kategori C',
                'slug' => 'kategori-c',
                'foto' => '20230127222545.jpg',
                'keterangan' => 'Keterangan Kategori C',
                'created_at' => '2023-01-27 22:25:45',
                'updated_at' => '2023-01-27 22:25:45',
            ),
            3 => 
            array (
                'id' => '5',
                'nama' => 'Kategori E',
                'slug' => 'kategori-e',
                'foto' => '20230127222641.jpg',
                'keterangan' => 'Keterangan Kategori E',
                'created_at' => '2023-01-27 22:26:41',
                'updated_at' => '2023-01-27 22:26:41',
            ),
            4 => 
            array (
                'id' => '6',
                'nama' => 'Testing',
                'slug' => 'testing',
                'foto' => '20230128001123.jpg',
                'keterangan' => 'untuk diperiksa dan disetujui',
                'created_at' => '2023-01-28 00:11:23',
                'updated_at' => '2023-01-28 00:11:23',
            ),
        ));
        
        
    }
}