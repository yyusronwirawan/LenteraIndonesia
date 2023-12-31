@extends('templates.admin.master')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Halaman Utama</h1>
    </div>

    <!-- ROW OPEN -->
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.user') }}">
                <div class="card bg-primary img-card box-primary-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_anggota }}</h2>
                                <p class="text-white mb-0">Jumlah Pengguna </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-users text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.artikel.data') }}">
                <div class="card bg-secondary img-card box-secondary-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_artikel }}</h2>
                                <p class="text-white mb-0">Jumlah Artikel </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-file-alt text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.galeri') }}">
                <div class="card bg-indigo img-card box-indigo-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_galeri }}</h2>
                                <p class="text-white mb-0">Jumlah Gelri </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-images text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.kontak.message') }}">
                <div class="card bg-info img-card box-info-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_pesan }}</h2>
                                <p class="text-white mb-0">Jumlah Pesan Diterima </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-envelope text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.struktur') }}">
                <div class="card bg-warning img-card box-warning-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_pengurus }}</h2>
                                <p class="text-white mb-0">Jumlah Pengurus </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-network-wired text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.password') }}">
                <div class="card  bg-success img-card box-success-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h3 class="mb-0 number-font">Ganti Password</h3>
                                <p class="text-white mb-0"><br></p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-key text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

@section('stylesheet')
    <style>
        .card-main {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            margin: 3px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
@endsection

{{-- 
    - Jumlah pengguna [link]
    - Jumlah artikel yang ada [link]
    - Jumlah galeri [link]
    - Jumlah Pesan Diterima [link]
    - Jumlah Pengurus [link]
    --}}
