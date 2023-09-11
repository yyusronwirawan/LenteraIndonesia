<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProduksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produks')->delete();
        
        \DB::table('produks')->insert(array (
            0 => 
            array (
                'id' => '1',
                'kategori_id' => '1',
                'nama' => 'Produk Kategori A A',
                'slug' => NULL,
                'foto' => '20230127222743.jpg',
                'keterangan' => 'Produk Kategori A A',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-27 22:27:43',
                'updated_at' => '2023-01-27 22:27:43',
            ),
            1 => 
            array (
                'id' => '2',
                'kategori_id' => '1',
                'nama' => 'Produk Kategori A B',
                'slug' => NULL,
                'foto' => '20230127222757.jpg',
                'keterangan' => 'Produk Kategori A B',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-27 22:27:57',
                'updated_at' => '2023-01-27 22:27:57',
            ),
            2 => 
            array (
                'id' => '3',
                'kategori_id' => '1',
                'nama' => 'Produk Kategori A C',
                'slug' => NULL,
                'foto' => '20230127222819.jpg',
                'keterangan' => 'Produk Kategori A C',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-27 22:28:19',
                'updated_at' => '2023-01-27 22:28:19',
            ),
            3 => 
            array (
                'id' => '4',
                'kategori_id' => '2',
                'nama' => 'Produk Kategori B A',
                'slug' => NULL,
                'foto' => '20230127223220.jpg',
                'keterangan' => 'Produk Kategori B A',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-27 22:32:20',
                'updated_at' => '2023-01-27 22:32:20',
            ),
            4 => 
            array (
                'id' => '5',
                'kategori_id' => '2',
                'nama' => 'Produk Kategori B B',
                'slug' => NULL,
                'foto' => '20230127223237.jpg',
                'keterangan' => 'Produk Kategori B B',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-27 22:32:37',
                'updated_at' => '2023-01-27 22:32:37',
            ),
            5 => 
            array (
                'id' => '6',
                'kategori_id' => '2',
                'nama' => 'Produk Kategori B C',
                'slug' => NULL,
                'foto' => '20230127223251.jpg',
                'keterangan' => 'Produk Kategori B C',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-27 22:32:51',
                'updated_at' => '2023-01-27 22:32:51',
            ),
            6 => 
            array (
                'id' => '7',
                'kategori_id' => NULL,
                'nama' => 'Produk Kategori D A',
                'slug' => NULL,
                'foto' => '20230127223313.jpg',
                'keterangan' => 'Produk Kategori D A',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-27 22:33:13',
                'updated_at' => '2023-01-27 22:33:13',
            ),
        ));
        
        
    }
}