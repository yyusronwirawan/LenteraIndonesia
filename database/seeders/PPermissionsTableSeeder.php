<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_permissions')->delete();
        
        \DB::table('p_permissions')->insert(array (
            0 => 
            array (
                'id' => '2',
                'name' => 'admin.dashboard',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            1 => 
            array (
                'id' => '3',
                'name' => 'admin.user',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            2 => 
            array (
                'id' => '4',
                'name' => 'admin.user.excel',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            3 => 
            array (
                'id' => '5',
                'name' => 'admin.user.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            4 => 
            array (
                'id' => '6',
                'name' => 'admin.user.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            5 => 
            array (
                'id' => '7',
                'name' => 'admin.user.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            6 => 
            array (
                'id' => '8',
                'name' => 'admin.artikel.data',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            7 => 
            array (
                'id' => '9',
                'name' => 'admin.artikel.data.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            8 => 
            array (
                'id' => '10',
                'name' => 'admin.artikel.data.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            9 => 
            array (
                'id' => '11',
                'name' => 'admin.artikel.data.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            10 => 
            array (
                'id' => '12',
                'name' => 'admin.artikel.kategori',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            11 => 
            array (
                'id' => '13',
                'name' => 'admin.artikel.kategori.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            12 => 
            array (
                'id' => '14',
                'name' => 'admin.artikel.kategori.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            13 => 
            array (
                'id' => '15',
                'name' => 'admin.artikel.kategori.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            14 => 
            array (
                'id' => '16',
                'name' => 'admin.artikel.tag',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            15 => 
            array (
                'id' => '17',
                'name' => 'admin.artikel.tag.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            16 => 
            array (
                'id' => '18',
                'name' => 'admin.artikel.tag.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            17 => 
            array (
                'id' => '19',
                'name' => 'admin.artikel.tag.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            18 => 
            array (
                'id' => '20',
                'name' => 'admin.galeri',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            19 => 
            array (
                'id' => '21',
                'name' => 'admin.galeri.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            20 => 
            array (
                'id' => '22',
                'name' => 'admin.galeri.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            21 => 
            array (
                'id' => '23',
                'name' => 'admin.galeri.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            22 => 
            array (
                'id' => '24',
                'name' => 'admin.social_media',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            23 => 
            array (
                'id' => '25',
                'name' => 'admin.social_media.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            24 => 
            array (
                'id' => '26',
                'name' => 'admin.social_media.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            25 => 
            array (
                'id' => '27',
                'name' => 'admin.social_media.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            26 => 
            array (
                'id' => '28',
                'name' => 'admin.struktur',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            27 => 
            array (
                'id' => '29',
                'name' => 'admin.struktur.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            28 => 
            array (
                'id' => '30',
                'name' => 'admin.struktur.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            29 => 
            array (
                'id' => '31',
                'name' => 'admin.struktur.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            30 => 
            array (
                'id' => '32',
                'name' => 'admin.struktur.setting',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            31 => 
            array (
                'id' => '33',
                'name' => 'admin.pendaftaran.gform',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            32 => 
            array (
                'id' => '34',
                'name' => 'admin.pendaftaran.gform.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            33 => 
            array (
                'id' => '35',
                'name' => 'admin.pendaftaran.gform.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            34 => 
            array (
                'id' => '36',
                'name' => 'admin.pendaftaran.gform.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            35 => 
            array (
                'id' => '37',
                'name' => 'admin.utility.notif_depan_atas',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            36 => 
            array (
                'id' => '38',
                'name' => 'admin.utility.notif_depan_atas.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            37 => 
            array (
                'id' => '39',
                'name' => 'admin.utility.notif_depan_atas.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            38 => 
            array (
                'id' => '40',
                'name' => 'admin.utility.notif_depan_atas.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            39 => 
            array (
                'id' => '41',
                'name' => 'admin.utility.notif_admin_atas',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            40 => 
            array (
                'id' => '42',
                'name' => 'admin.utility.notif_admin_atas.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            41 => 
            array (
                'id' => '43',
                'name' => 'admin.utility.notif_admin_atas.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            42 => 
            array (
                'id' => '44',
                'name' => 'admin.utility.notif_admin_atas.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            43 => 
            array (
                'id' => '45',
                'name' => 'admin.utility.hari_besar_nasional',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            44 => 
            array (
                'id' => '46',
                'name' => 'admin.utility.hari_besar_nasional.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            45 => 
            array (
                'id' => '47',
                'name' => 'admin.utility.hari_besar_nasional.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            46 => 
            array (
                'id' => '48',
                'name' => 'admin.utility.hari_besar_nasional.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            47 => 
            array (
                'id' => '49',
                'name' => 'admin.user_access.role',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            48 => 
            array (
                'id' => '50',
                'name' => 'admin.user_access.role.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            49 => 
            array (
                'id' => '51',
                'name' => 'admin.user_access.role.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            50 => 
            array (
                'id' => '52',
                'name' => 'admin.user_access.role.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            51 => 
            array (
                'id' => '53',
                'name' => 'admin.user_access.permission',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            52 => 
            array (
                'id' => '54',
                'name' => 'admin.user_access.permission.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            53 => 
            array (
                'id' => '55',
                'name' => 'admin.user_access.permission.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            54 => 
            array (
                'id' => '56',
                'name' => 'admin.user_access.permission.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            55 => 
            array (
                'id' => '57',
                'name' => 'admin.menu.admin',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            56 => 
            array (
                'id' => '58',
                'name' => 'admin.menu.admin.save',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            57 => 
            array (
                'id' => '59',
                'name' => 'admin.menu.admin.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            58 => 
            array (
                'id' => '60',
                'name' => 'admin.menu.admin.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            59 => 
            array (
                'id' => '61',
                'name' => 'admin.menu.admin.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            60 => 
            array (
                'id' => '62',
                'name' => 'admin.menu.frontend',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            61 => 
            array (
                'id' => '63',
                'name' => 'admin.menu.frontend.save',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            62 => 
            array (
                'id' => '64',
                'name' => 'admin.menu.frontend.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            63 => 
            array (
                'id' => '65',
                'name' => 'admin.menu.frontend.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            64 => 
            array (
                'id' => '66',
                'name' => 'admin.menu.frontend.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            65 => 
            array (
                'id' => '67',
                'name' => 'admin.setting.admin',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            66 => 
            array (
                'id' => '68',
                'name' => 'admin.setting.admin.save.app',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            67 => 
            array (
                'id' => '69',
                'name' => 'admin.setting.admin.save.meta',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            68 => 
            array (
                'id' => '70',
                'name' => 'admin.setting.admin.meta',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            69 => 
            array (
                'id' => '71',
                'name' => 'admin.setting.admin.meta.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            70 => 
            array (
                'id' => '72',
                'name' => 'admin.setting.admin.meta.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            71 => 
            array (
                'id' => '73',
                'name' => 'admin.setting.admin.meta.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            72 => 
            array (
                'id' => '74',
                'name' => 'admin.setting.front',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            73 => 
            array (
                'id' => '75',
                'name' => 'admin.setting.front.save.app',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            74 => 
            array (
                'id' => '76',
                'name' => 'admin.setting.front.save.meta',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            75 => 
            array (
                'id' => '77',
                'name' => 'admin.setting.front.meta',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            76 => 
            array (
                'id' => '78',
                'name' => 'admin.setting.front.meta.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            77 => 
            array (
                'id' => '79',
                'name' => 'admin.setting.front.meta.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            78 => 
            array (
                'id' => '80',
                'name' => 'admin.setting.front.meta.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            79 => 
            array (
                'id' => '81',
                'name' => 'admin.setting.home',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            80 => 
            array (
                'id' => '82',
                'name' => 'admin.setting.home.hero',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            81 => 
            array (
                'id' => '83',
                'name' => 'admin.setting.home.about',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            82 => 
            array (
                'id' => '84',
                'name' => 'admin.setting.home.terima_kasih',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            83 => 
            array (
                'id' => '85',
                'name' => 'admin.setting.home.visi_misi',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            84 => 
            array (
                'id' => '86',
                'name' => 'admin.setting.home.galeri_kegiatan',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            85 => 
            array (
                'id' => '87',
                'name' => 'admin.setting.home.artikel',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            86 => 
            array (
                'id' => '88',
                'name' => 'home_slider',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            87 => 
            array (
                'id' => '89',
                'name' => 'home_slider.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            88 => 
            array (
                'id' => '90',
                'name' => 'home_slider.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            89 => 
            array (
                'id' => '91',
                'name' => 'home_slider.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            90 => 
            array (
                'id' => '92',
                'name' => 'visi_misi',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            91 => 
            array (
                'id' => '93',
                'name' => 'visi_misi.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            92 => 
            array (
                'id' => '94',
                'name' => 'admin.kontak.faq',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            93 => 
            array (
                'id' => '95',
                'name' => 'admin.kontak.faq.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            94 => 
            array (
                'id' => '96',
                'name' => 'admin.kontak.faq.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            95 => 
            array (
                'id' => '97',
                'name' => 'admin.kontak.faq.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            96 => 
            array (
                'id' => '98',
                'name' => 'admin.kontak.faq.setting',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            97 => 
            array (
                'id' => '99',
                'name' => 'admin.kontak.list',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            98 => 
            array (
                'id' => '100',
                'name' => 'admin.kontak.list.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            99 => 
            array (
                'id' => '101',
                'name' => 'admin.kontak.list.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            100 => 
            array (
                'id' => '102',
                'name' => 'admin.kontak.list.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            101 => 
            array (
                'id' => '103',
                'name' => 'admin.kontak.list.setting',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            102 => 
            array (
                'id' => '104',
                'name' => 'admin.kontak.message',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            103 => 
            array (
                'id' => '105',
                'name' => 'admin.kontak.message.setting',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            104 => 
            array (
                'id' => '106',
                'name' => 'admin.password',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            105 => 
            array (
                'id' => '107',
                'name' => 'admin.password.save',
                'guard_name' => 'web',
                'created_at' => '2023-01-18 02:46:46',
                'updated_at' => '2023-01-18 02:46:46',
            ),
            106 => 
            array (
                'id' => '108',
                'name' => 'admin.setting.visi_misi',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:17',
                'updated_at' => '2023-01-22 17:18:17',
            ),
            107 => 
            array (
                'id' => '109',
                'name' => 'admin.setting.visi_misi.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:22',
                'updated_at' => '2023-01-22 17:18:22',
            ),
            108 => 
            array (
                'id' => '110',
                'name' => 'admin.setting.visi_misi.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:26',
                'updated_at' => '2023-01-22 17:18:26',
            ),
            109 => 
            array (
                'id' => '111',
                'name' => 'admin.setting.visi_misi.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:31',
                'updated_at' => '2023-01-22 17:18:31',
            ),
            110 => 
            array (
                'id' => '112',
                'name' => 'admin.setting.home_slider.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:42',
                'updated_at' => '2023-01-22 17:18:42',
            ),
            111 => 
            array (
                'id' => '113',
                'name' => 'admin.setting.home_slider.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:47',
                'updated_at' => '2023-01-22 17:18:47',
            ),
            112 => 
            array (
                'id' => '114',
                'name' => 'admin.setting.home_slider.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:52',
                'updated_at' => '2023-01-22 17:18:52',
            ),
            113 => 
            array (
                'id' => '115',
                'name' => 'admin.setting.home_slider',
                'guard_name' => 'web',
                'created_at' => '2023-01-22 17:18:57',
                'updated_at' => '2023-01-22 17:18:57',
            ),
            114 => 
            array (
                'id' => '116',
                'name' => 'admin.produk.kategori',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:09:36',
                'updated_at' => '2023-01-28 00:09:36',
            ),
            115 => 
            array (
                'id' => '117',
                'name' => 'admin.produk.kategori.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:09:41',
                'updated_at' => '2023-01-28 00:09:41',
            ),
            116 => 
            array (
                'id' => '118',
                'name' => 'admin.produk.kategori.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:09:46',
                'updated_at' => '2023-01-28 00:09:46',
            ),
            117 => 
            array (
                'id' => '119',
                'name' => 'admin.produk.kategori.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:09:51',
                'updated_at' => '2023-01-28 00:09:51',
            ),
            118 => 
            array (
                'id' => '120',
                'name' => 'admin.produk.delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:09:56',
                'updated_at' => '2023-01-28 00:09:56',
            ),
            119 => 
            array (
                'id' => '121',
                'name' => 'admin.produk.insert',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:10:01',
                'updated_at' => '2023-01-28 00:10:01',
            ),
            120 => 
            array (
                'id' => '122',
                'name' => 'admin.produk.update',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:10:06',
                'updated_at' => '2023-01-28 00:10:06',
            ),
            121 => 
            array (
                'id' => '123',
                'name' => 'admin.produk',
                'guard_name' => 'web',
                'created_at' => '2023-01-28 00:10:11',
                'updated_at' => '2023-01-28 00:10:11',
            ),
        ));
        
        
    }
}