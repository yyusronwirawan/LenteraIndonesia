<?php
// ====================================================================================================================
// utility ============================================================================================================
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

// ====================================================================================================================
// Admin ==============================================================================================================
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\DashboardController;

// Artikel ============================================================================================================
use App\Http\Controllers\Admin\Artikel\ArtikelController;
use App\Http\Controllers\Admin\Artikel\KategoriController;
use App\Http\Controllers\Admin\Artikel\TagController;

// Contact ============================================================================================================
use App\Http\Controllers\Admin\Contact\FAQController;
use App\Http\Controllers\Admin\Contact\ListContactController;
use App\Http\Controllers\Admin\Contact\MessageController;

// User Access ========================================================================================================
use App\Http\Controllers\Admin\UserAccess\PermissionController;
use App\Http\Controllers\Admin\UserAccess\RoleController;

// Menu ===============================================================================================================
use App\Http\Controllers\Admin\Menu\AdminController as MenuAdminController;
use App\Http\Controllers\Admin\Menu\FrontendController as MenuFrontendController;

// Pendaftaran ========================================================================================================
use App\Http\Controllers\Admin\Pendaftaran\GFormController;

// Setting ============================================================================================================
use App\Http\Controllers\Admin\Setting\AdminController;
use App\Http\Controllers\Admin\Setting\FrontController;
use App\Http\Controllers\Admin\Setting\HomeController;
use App\Http\Controllers\Admin\Setting\HomeSliderController;
use App\Http\Controllers\Admin\Setting\VisiMisiController;

// Utility ============================================================================================================
use App\Http\Controllers\Admin\Utility\HariBesarNasionalController;
use App\Http\Controllers\Admin\Utility\NotifAdminAtasController;
use App\Http\Controllers\Admin\Utility\NotifDepanAtasController;
use App\Http\Controllers\Admin\StrukturController;

// Produk ============================================================================================================
use App\Http\Controllers\Admin\Produk\KategoriController as ProdukKategoriController;
use App\Http\Controllers\Admin\Produk\ProdukController;

// ====================================================================================================================



$name = 'admin';
$prefix = 'dashboard';
Route::group(
    [
        'prefix' => $prefix,
        'middleware' => "permission:$name.$prefix",
        'controller' => DashboardController::class
    ],
    function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.dashboard
        Route::get('/', 'index')->name($name);
    }
);

Route::get('/', fn () => Redirect::route('admin.dashboard'));

$prefix = 'user';
Route::controller(UserController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.user
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/excel', 'excel')->name("$name.excel")->middleware("permission:$name.excel");

    Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.insert");
    Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
});

$prefix = 'artikel';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.artikel

    $prefix = 'data';
    Route::controller(ArtikelController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.artikel.data
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/add', 'add')->name("$name.add")->middleware("permission:$name.insert");
        Route::get('/edit/{artikel}', 'edit')->name("$name.edit")->middleware("permission:$name.update");

        Route::delete('/{artikel}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/insert', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'kategori';
    Route::controller(KategoriController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; //admin.artikel.kategori
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'tag';
    Route::controller(TagController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.artikel.tag
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });
});

$prefix = 'galeri';
Route::controller(GaleriController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.galeri
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
});

$prefix = 'social_media';
Route::controller(SocialMediaController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.social_media
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
});

$prefix = 'struktur';
Route::controller(StrukturController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.struktur
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
});

$prefix = 'pendaftaran';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.pendaftaran

    $prefix = 'gform';
    Route::controller(GFormController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.pendaftaran.gform
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/member', 'member_select2')->name("$name.member")->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });
});

$prefix = 'utility';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.utility
    $prefix = 'notif_depan_atas';
    Route::controller(NotifDepanAtasController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.utility.notif_depan_atas
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'notif_admin_atas';
    Route::controller(NotifAdminAtasController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.utility.notif_admin_atas
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'hari_besar_nasional';
    Route::controller(HariBesarNasionalController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.utility.hari_besar_nasional
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::get('/list_error', 'list_error')->name("$name.list_error")->middleware("permission:$name");
    });
});

$prefix = 'user_access';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.user_access

    $prefix = 'permission';
    Route::controller(PermissionController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.user_access.permission
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.insert");
        Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'role';
    Route::controller(RoleController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.user_access.role
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/create', 'create')->name("$name.create")->middleware("permission:$name.insert");
        Route::get('/edit/{model}', 'edit')->name("$name.edit")->middleware("permission:$name.update");
        Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });
});

$prefix = 'menu';
Route::prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.menu

    $prefix = 'admin';
    Route::controller(MenuAdminController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.menu.admin
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::put('/save', 'save')->name("$name.save")->middleware("permission:$name.save");

        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

        Route::get('/list', 'list')->name("$name.list")->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::get('/parent_list', 'parent_list')->name("$name.parent_list")->middleware("permission:$name");
    });

    $prefix = 'frontend';
    Route::controller(MenuFrontendController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.menu.frontend
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::put('/save', 'save')->name("$name.save")->middleware("permission:$name.save");

        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

        Route::get('/list', 'list')->name("$name.list")->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::get('/parent_list', 'parent_list')->name("$name.parent_list")->middleware("permission:$name");
    });
});

$prefix = "setting";
Route::prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.setting

    $prefix = 'admin';
    $name_ = "$name.$prefix"; // admin.setting.admin
    Route::group([
        'controller' => AdminController::class,
        'prefix' => $prefix,
        'middleware' => "permission:$name_"
    ], function () use ($name_) {
        Route::get('/', 'index')->name($name_);
        Route::post('/save/app', 'save_app')->name("$name_.save.app");
        Route::post('/save/meta', 'save_meta')->name("$name_.save.meta");

        Route::get('/meta', 'meta_list')->name("$name_.meta");
        Route::post('/meta/insert', 'meta_insert')->name("$name_.meta.insert");
        Route::post('/meta/update', 'meta_update')->name("$name_.meta.update");
        Route::delete('/meta/delete', 'meta_delete')->name("$name_.meta.delete");
    });

    $prefix = 'front';
    $name_ = "$name.$prefix"; // admin.setting.front
    Route::group([
        'controller' => FrontController::class,
        'prefix' => $prefix,
        'middleware' => "permission:$name_"
    ], function () use ($name_) {
        Route::get('/', 'index')->name($name_);
        Route::post('/save/app', 'save_app')->name("$name_.save.app");
        Route::post('/save/meta', 'save_meta')->name("$name_.save.meta");

        Route::get('/meta', 'meta_list')->name("$name_.meta");
        Route::post('/meta/insert', 'meta_insert')->name("$name_.meta.insert");
        Route::post('/meta/update', 'meta_update')->name("$name_.meta.update");
        Route::delete('/meta/delete', 'meta_delete')->name("$name_.meta.delete");
    });

    $prefix = 'home';
    $name_ = "$name.$prefix"; // admin.setting.home
    Route::group([
        'controller' => HomeController::class,
        'prefix' => $prefix,
        'middleware' => "permission:$name_"
    ], function () use ($name_) {
        Route::get('/', 'index')->name($name_);

        // save
        $method = 'hero';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'about';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'terima_kasih';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'visi_misi';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'galeri_kegiatan';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'artikel';
        Route::post("/$method", $method)->name("$name_.$method");
    });

    $prefix = 'home_slider';
    Route::controller(HomeSliderController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.setting.home_slider
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'visi_misi';
    Route::controller(VisiMisiController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.setting.visi_misi
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });
});

$prefix = 'kontak';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.kontak
    $prefix = 'faq';
    Route::controller(FAQController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kontak.faq
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });

    $prefix = 'list';
    Route::controller(ListContactController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kontak.list
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });

    $prefix = 'message';
    Route::controller(MessageController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kontak.message
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });
});


$prefix = 'produk';
Route::prefix($prefix)->group(function () use ($prefix, $name) {
    $name = "$name.$prefix"; // admin.produk
    Route::controller(ProdukController::class)->group(function () use ($name) {
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });

    $prefix = 'kategori';
    Route::prefix($prefix)->controller(ProdukKategoriController::class)->group(function () use ($prefix, $name) {
        $name = "$name.$prefix"; // admin.produk.kategori
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });
});


$prefix = "password";
Route::controller(UserController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.password
    Route::get('/', 'change_password')->name($name)->middleware("permission:$name");
    Route::post('/save', 'save_password')->name("$name.save")->middleware("permission:$name.save");
});
