<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\Setting\HomeSlider;
use App\Models\Struktur;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Frontend\HomeRepository;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $folder_image = '/assets/setting/home';

    public function index(Request $request)
    {

        $page_attr = [
            'navigation' => 'home',
        ];
        // frontend
        $list_sosmed = get_sosmed();

        // artikel
        if ($this->checkVisible('artikel')) {
            $request->limit = 6;
            $articles = Artikel::getList($request);
        } else {
            $articles = [];
        }

        if ($this->checkVisible('galeri_kegiatan')) {
            $galeri_limit = settings()->get('setting.home.galeri_kegiatan.limit', 6);
            $galeri_list = Galeri::where('status', '=', 1)->select([DB::raw('*'), DB::raw("date_format(tanggal, '%d %M %Y') as tanggal_str")])
                ->orderBy('tanggal', 'desc')->limit($galeri_limit)->get();
        } else {
            $galeri_list = [];
        }

        // slider
        $home_sliders = HomeSlider::where('tampilkan', 'Ya')->orderBy('nama')->get();
        $home_slider_url = asset(HomeSlider::image_folder);

        // slider
        $strukturs = Struktur::where('tampilkan', 'Ya')->orderBy('urutan')->get();
        $struktur_url = asset(Struktur::image_folder);

        // Produk
        $kategori_limit = settings()->get("setting.produk.kategori.home_paginate", 9);

        $t_produk_kategori = ProdukKategori::tableName;
        $produk_kategori_folder = ProdukKategori::image_folder;

        $t_produk = Produk::tableName;
        $produk_folder = Produk::image_folder;

        $produk_kategories = ProdukKategori::whereRaw("(select count(*) from $t_produk where $t_produk.kategori_id = $t_produk_kategori.id) > 0")
            ->limit($kategori_limit)
            ->get();
        $produk_limit = $kategori_limit = settings()->get("setting.produk.home_paginate", 9);
        $produks = Produk::where('tampilkan', 'Ya')->orderBy('created_at')->limit($produk_limit, 'desc')->get();
        $folder_image = $this->folder_image;
        $data = compact(
            'page_attr',
            'list_sosmed',
            'articles',
            'galeri_list',
            'home_slider_url',
            'home_sliders',
            'struktur_url',
            'strukturs',
            'folder_image',
            'produk_kategories',
            'produk_kategori_folder',
            'produks',
            'produk_folder',
        );
        $data['compact'] = $data;

        return view('frontend.home', $data);
    }

    // artikel render
    public function artikel(Artikel $model)
    {
        if (request('preview') != 1) {
            if ($model->status == 0) return abort(404);
        }
        // tambah pengunjung
        $model->counter = $model->counter + 1;
        $model->save();

        $user = User::find($model->user_id);
        $get_id_yt = check_image_youtube($model->detail);
        $foto = $model->foto ? asset($model->foto) : 'https://i.ytimg.com/vi/' . $get_id_yt . '/sddefault.jpg';

        $keyword = HomeRepository::artikelTagKeyword($model->id);
        $keyword = ($keyword == '') ? HomeRepository::artikelKategoriKeyword($model->id) : $keyword;

        $artikel_tag = HomeRepository::artikelTag($model->id);
        $artikel_kategori = HomeRepository::artikelKategori($model->id);
        $page_attr = [
            'title' => $model->nama,
            'url' => route('artikel', $model->slug),
            'type' => 'article',
            'description' => $model->excerpt,
            'keywords' =>  $keyword,
            'author' => $user->name,
            'navigation' => 'home',
            'image' => $foto,
        ];

        // side
        $top_article = HomeRepository::topArticle(3);

        $image_folder_user = User::image_folder;
        $image_default_user = User::image_default;

        // sidebar
        // artikel popular
        $top_article = HomeRepository::topArticle(3);

        // kategori and tag
        $tags = HomeRepository::getTagsList();
        $categories = HomeRepository::getKategoriList();


        // return
        return view('frontend.artikel', compact(
            'page_attr',
            'model',
            'user',
            'image_folder_user',
            'image_default_user',
            'artikel_tag',
            'artikel_kategori',

            // sidebar
            'top_article',
            'tags',
            'categories',
        ));
    }


    private function checkVisible(string $item): ?bool
    {
        return settings()->get("setting.home.$item.visible", false);
    }
}
