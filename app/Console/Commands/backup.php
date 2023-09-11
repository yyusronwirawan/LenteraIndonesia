<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backup {type=all} {--current=1}  {--users=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database using iseed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $is_windows = strtolower(PHP_SHLIB_SUFFIX) === 'dll';

        $win_parse = function ($str) use ($is_windows) {
            return str_replace(['\\', '/'], ($is_windows ? '\\' : '/'), $str);
        };

        $root = dirname(__FILE__);
        $root = "$root/../../..";
        $arg_type = $this->argument('type');
        $opt_users = $this->option('users');
        // backup migrasi database sebelumnya
        if ($this->option('current') == 1) {
            // pindahkan folder dulu
            $folder_parent = $win_parse("$root/backup");
            $folder_backup = $win_parse("$folder_parent/" . date('Y-m-d'));

            if (!file_exists("$folder_parent")) echo shell_exec("mkdir $folder_parent");
            if (!file_exists($folder_backup)) echo shell_exec("mkdir $folder_backup");
            $copy = $is_windows ? 'copy' : 'cp -R';
            shell_exec($win_parse("$copy $root/database/seeders/* $folder_backup"));

            echo 'Berhasil backup data sebelumnya' . PHP_EOL;
        }

        $tables =  [
            'artikel' => [
                'artikel',
                'artikel_tag',
                'artikel_kategori',
                'artikel_tag_item',
                'artikel_kategori_item'
            ],
            'galeri' => [
                'galeri',
                'galeri_tag_member'
            ],
            'frontend' => [
                'social_media',
            ],
            'pendaftaran' => [
                'g_forms'
            ],
            'permissions' => [
                'p_roles',
                'p_permissions',
                'p_menu',
                'p_model_has_permissions',
                'p_model_has_roles',
                'p_role_has_permissions',
                'p_role_has_menu',
                'p_menu_frontends',
            ],
            'utility' => [
                'notif_admin_atas',
                'notif_depan_atas',
                'hari_besar_nasionals',
            ],
            'contact' => [
                'contact_list',
                'contact_messages',
            ],
            'other' => [
                'faq',
            ],
            'data' => [
                'strukturs',
            ],
            'setting' => [
                'home_sliders',
            ],
            'produk' => [
                'produk_kategoris',
                'produks',
            ],
        ];
        if ($opt_users == 1 || $arg_type == 'users') echo shell_exec('php artisan iseed users --force');
        foreach ($tables as $k => $t) {
            $type = $arg_type == 'all' ? $tables[$k] : ($k == $arg_type ? $t : []);
            foreach ($type as $table) {
                echo shell_exec('php artisan iseed ' . $table . ' --force');
            }

            if (in_array($arg_type, $t)) {
                echo shell_exec('php artisan iseed ' . $arg_type . ' --force');
            }
        }
        return 1;
    }
}
