<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StruktursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('strukturs')->delete();
        
        \DB::table('strukturs')->insert(array (
            0 => 
            array (
                'id' => '1',
                'urutan' => '1',
                'nama' => 'Hessy Widiyastuti, S.Psi, M.Pd',
                'jabatan' => 'Ketua Dewan Pembina',
                'foto' => '20230118003125.jpg',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:31:25',
                'updated_at' => '2023-01-18 00:31:25',
            ),
            1 => 
            array (
                'id' => '2',
                'urutan' => '3',
                'nama' => 'Boy Hidayat',
                'jabatan' => 'Direktur Eksekutif',
                'foto' => '20230118003200.jpeg',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:32:00',
                'updated_at' => '2023-01-23 10:35:21',
            ),
            2 => 
            array (
                'id' => '3',
                'urutan' => '4',
                'nama' => 'Dadan S. Sumardja',
                'jabatan' => 'Sekretaris Eksekutif',
                'foto' => '20230118003218.jpg',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:32:18',
                'updated_at' => '2023-01-23 10:34:44',
            ),
            3 => 
            array (
                'id' => '4',
                'urutan' => '5',
                'nama' => 'Chiechie Sari Rachma',
                'jabatan' => 'Bendahara',
                'foto' => '20230124154535.jpeg',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:32:41',
                'updated_at' => '2023-01-24 15:45:35',
            ),
            4 => 
            array (
                'id' => '5',
                'urutan' => '2',
                'nama' => 'Rudi',
                'jabatan' => 'Dewan Pengawas',
                'foto' => '20230118003333.png',
                'tampilkan' => 'Tidak',
                'created_at' => '2023-01-18 00:33:33',
                'updated_at' => '2023-01-23 10:36:24',
            ),
        ));
        
        
    }
}