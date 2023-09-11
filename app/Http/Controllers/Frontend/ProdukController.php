<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Frontend\HomeRepository;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $page_attr = [
            'title' => 'List Produk',
        ];

        $paginate = is_numeric($request->limit) ? $request->limit : settings()->get("setting.produk.produk_paginate", 9);


        $kategories = ProdukKategori::all();
        $kategori_selected = $request->kategori ?
            ProdukKategori::select(['nama', 'slug', 'id'])->where('slug', '=', $request->kategori)->first() : null;

        $produks = Produk::where('tampilkan', 'Ya');

        if ($request->search != null) {
            $produks->whereRaw("(
                nama like '%$request->search%' or
                keterangan like '%$request->search%'
            )");
        }

        if ($kategori_selected != null) {
            $produks->where('kategori_id', $kategori_selected->id);
        }

        $produks->orderBy('created_at', 'desc');
        $produks = $produks->paginate($paginate)
            ->appends(request()->query());

        $produk_folder = Produk::image_folder;


        $data = compact(
            'page_attr',
            'kategori_selected',
            'produk_folder',
            'kategories',
            'produks',
        );
        $data['compact'] = $data;
        return view('frontend.produk.list', $data);
    }

    // artikel render
    public function detail(Artikel $model)
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
            'author' => is_null($user) ? '' : $user->name,
            'navigation' => 'artikel',
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
        return view('frontend.artikel.detail', compact(
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
}
