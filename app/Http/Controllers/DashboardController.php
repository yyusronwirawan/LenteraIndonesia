<?php

namespace App\Http\Controllers;

use App\Models\Artikel\Artikel;
use App\Models\Galeri;
use App\Models\User;
use App\Models\Contact\Message as ContactMessage;
use App\Models\Struktur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $total_anggota = User::count();
        $total_artikel = Artikel::count();
        $total_galeri = Galeri::count();
        $total_pesan = ContactMessage::count();
        $total_pengurus = Struktur::count();
        $page_attr = ['title' => 'Halaman Utama'];
        return view('member.dashborard', compact(
            'total_anggota',
            'total_artikel',
            'total_galeri',
            'total_pesan',
            'total_pengurus',
            'page_attr',
        ));
    }
}
