<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\BeritaController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Analytics\Period;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'admin'])->group(function () {

    // admin
    Route::controller(Admincontroller::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
        Route::get('/admin/userprofile', 'AdminProfile')->name('adminprofile');
        Route::get('/admin/logout',  'AdminDestroy')->name('admin.logout');
    });


    // User
    Route::controller(UserController::class)->group(function () {
        Route::get('/admin/user', 'index')->name('admin.user');
        Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
        Route::get('/add/user', 'AddUser')->name('add.user');
        Route::post('/store/user', 'UserStore')->name('store.user');
        Route::get('/user/inactive/{id}', 'UserInActive')->name('user.inactive');
        Route::get('/user/active/{id}', 'UserActive')->name('user.active');
        route::get('/admin/edit/user/{id}', 'EditUser')->name('edit.user');
        Route::post('/admin/update/user', 'UpdateUser')->name('update.user');
    });


    // Sliders
    Route::controller(SliderController::class)->group(function () {
        Route::get('/admin/slider', 'index')->name('slider');
        // Route::get('/admin/add/happening', 'AddHappening')->name('add.happening');
        Route::post('/admin/store/slider', 'StoreSlider')->name('store.slider');
        Route::get('/admin/delete/slider/{id}', 'DeleteSLider')->name('delete.slider');
        Route::get('/admin/slider/inactive/{id}', 'SliderInActive')->name('slider.inactive');
        Route::get('/admin//slider/active/{id}', 'SliderActive')->name('slider.active');
        route::get('/admin/edit/slider/{id}', 'EditSlider')->name('edit.slider');
        Route::post('/admin/update/slider', 'UpdateSlider')->name('update.slider');
    });

    // News
    Route::controller(NewsController::class)->group(function () {
        Route::get('/admin/news', 'index')->name('news');
        Route::post('/admin/store/news', 'StoreNews')->name('store.news');
        Route::get('/admin/delete/news/{id}', 'DeleteNews')->name('delete.news');
        route::get('/admin/edit/news/{id}', 'EditNews')->name('edit.news');
        Route::post('/admin/update/news', 'UpdateNews')->name('update.news');
        Route::get('/admin/news/inactive/{id}', 'NewsInActive')->name('news.inactive');
        Route::get('/admin/news/active/{id}', 'NewsActive')->name('news.active');
    });

    // Klasement dan Pertandingan
    Route::controller(\App\Http\Controllers\Backend\KlasementPertandinganController::class)->group(function () {
        Route::get('/admin/klasement_pertandingan', 'index')->name('klasement_pertandingan');

        Route::post('/admin/store/klasement', 'StoreKlasement')->name('store.klasement');
        Route::post('/admin/store/pertandingan', 'StorePertandingan')->name('store.pertandingan');

        Route::get('/admin/delete/klasement/{id}', 'DeleteKlasement')->name('delete.klasement');
        Route::get('/admin/delete/pertandingan/{id}', 'DeletePertandingan')->name('delete.pertandingan');

        route::get('/admin/edit/klasement/{id}', 'EditKlasement')->name('edit.klasement');
        route::get('/admin/edit/pertandingan/{id}', 'EditPertandingan')->name('edit.pertandingan');

        Route::post('/admin/update/klasement', 'UpdateKlasement')->name('update.klasement');
        Route::post('/admin/update/pertandingan', 'UpdatePertandingan')->name('update.pertandingan');

        Route::get('/admin/klasement/inactive/{id}', 'KlasementInActive')->name('klasement.inactive');
        Route::get('/admin/pertandingan/inactive/{id}', 'PertandinganInActive')->name('pertandingan.inactive');

        Route::get('/admin/klasement/active/{id}', 'KlasementActive')->name('klasement.active');
        Route::get('/admin/pertandingan/active/{id}', 'PertandinganActive')->name('pertandingan.active');
    });
    // Juara
    Route::controller(\App\Http\Controllers\Backend\JuaraController::class)->group(function () {
        Route::get('/admin/juara', 'index')->name('admin.juara');
        Route::post('/admin/store/juara', 'JuaraStore')->name('store.juara');
        Route::get('/admin/delete/juara/{id}', 'DeleteJuara')->name('delete.juara');
        route::get('/admin/edit/juara/{id}', 'EditJuara')->name('edit.juara');
        Route::post('/admin/update/juara', 'UpdateJuara')->name('update.juara');
        Route::get('/admin/juara/inactive/{id}', 'JuaraInActive')->name('juara.inactive');
        Route::get('/admin/juara/active/{id}', 'JuaraActive')->name('juara.active');
    });


    // Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/admin/profile', 'index')->name('profile');
        Route::post('/admin/store/profile', 'ProfileUpdate')->name('update.profile');
        Route::post('/admin/update/password', 'AdminUpdatePassword')->name('update.password');
    });



    // Event
    Route::controller(EventController::class)->group(function () {
        Route::get('/admin/event', 'index')->name('event');
        Route::post('/admin/store/event', 'StoreEvent')->name('store.event');
        Route::get('/admin/delete/event/{id}', 'DeleteEvent')->name('delete.event');
        route::get('/admin/edit/event/{id}', 'EditEvent')->name('edit.event');
        Route::post('/admin/update/event', 'UpdateEvent')->name('update.event');
        Route::get('/admin/event/inactive/{id}', 'EventInActive')->name('event.inactive');
        Route::get('/admin/event/active/{id}', 'EventActive')->name('event.active');
    });
// Jadwal dan semua turunannya (Group, Club, Match)
    Route::controller(\App\Http\Controllers\Backend\JadwalController::class)->group(function () {

        // Jadwal
        Route::get('/admin/jadwal', 'index')->name('jadwal');
        Route::post('/admin/store/jadwal', 'StoreJadwal')->name('store.jadwal');
        Route::get('/admin/delete/jadwal/{id}', 'DeleteJadwal')->name('delete.jadwal');
        Route::get('/admin/edit/jadwal/{id}', 'EditJadwal')->name('edit.jadwal');
        Route::post('/admin/update/jadwal', 'UpdateJadwal')->name('update_jadwal');

        Route::get('/admin/jadwal/inactive/{id}', 'JadwalInActive')->name('jadwal.inactive');
        Route::get('/admin/jadwal/active/{id}', 'JadwalActive')->name('jadwal.active');


        // Group
        Route::post('/admin/store/group', 'StoreGroup')->name('store.group');
        Route::get('/admin/delete/group/{id}', 'DeleteGroup')->name('delete.group');
        Route::get('/admin/edit/group/{id}', 'EditGroup')->name('edit.group');
        Route::post('/admin/update/group', 'UpdateGroup')->name('update_group');

        // Club (di dalam Group)
        Route::post('/admin/store/club', 'StoreClub')->name('group-club.store');
        Route::get('/admin/jadwal/clubs/{id}','editClub')->name('clubs.edit');
        Route::post('/admin/jadwal/update/club','updateDataClub')->name('club.update');
        Route::get('/admin/delete/clubs/{id}', 'DeleteClub')->name('delete.club');

        // Match (di dalam Group)
        Route::post('/admin/store/match', 'StoreMatch')->name('store.match');
        Route::post('/admin/jadwal/match/update/{id}','UpdateMatch')->name('update.match');
        Route::get('/admin/jadwal/match/delete/{id}', 'DeleteMatch')->name('delete.match');
        Route::get('/admin/jadwal/match/edit/{id}','EditMatch')->name('edit.match');



        Route::get('/admin/get_group/{id}', 'getGroupsByEvent');
        Route::get('/admin/get_clubs/{id}', 'getClubsByGroup');
        Route::get('/admin/get-groups-and-clubs/{jadwalId}', 'getGroupsAndClubs')->name('jadwal.get-groups-and-clubs');


    });




}); // end Backend Group middleware


// Frontend

//Home
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/Home/juara/detail/{id}/{slug}', 'DetailJuara')->name('detail_juara');
});


Route::controller(BeritaController::class)->group(function () {
    Route::get('/artikel_berita', 'index')->name('artikel_berita');
    Route::get('/artikel_berita/detail/{id}/{slug}', 'DetailBerita')->name('detail_berita');
});

Route::controller(\App\Http\Controllers\Frontend\JadwalController::class)->group(function () {
    Route::get('/jadwal_pertandingan', 'index')->name('pertandingan');
    Route::get('/jadwal_pertandingan/detail/{id}/{slug}', 'DetailBerita');
    Route::get('/jadwal_pertandingan/group/{id}', 'group')->name('detail.group');
    Route::get('/jadwal/{jadwal}/group/{group}', 'match')->name('detail.match');


});

//Evenet
Route::controller(\App\Http\Controllers\Frontend\EventController::class)->group(function () {
    Route::get('/event', 'index')->name('event-all');
    Route::get('/event/detail/{id}', 'getDetailEvent')->name('getDetailEvent');
});

//About
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about');
});

// BACKEND
Route::prefix('admin')
    ->name('backend.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('tips', \App\Http\Controllers\Backend\TipsController::class)
            ->except(['show']);
    });

// FRONTEND
Route::get('/tips', [\App\Http\Controllers\Frontend\TipsController::class, 'index'])
    ->name('tips');

Route::get('/tips/{slug}', [\App\Http\Controllers\Frontend\TipsController::class, 'show'])
    ->name('tips.detail');


    Route::prefix('admin')
    ->name('backend.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('anggota', \App\Http\Controllers\Backend\AnggotaController::class)
            ->except(['show']);
    });

// FRONTEND
Route::get('/anggota', [\App\Http\Controllers\Frontend\AnggotaController::class, 'index'])
    ->name('anggota');

// Route::get('/anggota/{slug}', [\App\Http\Controllers\Frontend\AnggotaController::class, 'show'])
//     ->name('anggota.detail');


        Route::prefix('admin')
    ->name('backend.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('produk', \App\Http\Controllers\Backend\ProdukController::class)
            ->except(['show']);
    });

// FRONTEND
// Route::get('/produk', [\App\Http\Controllers\Frontend\ProdukController::class, 'index'])
//     ->name('produk');

// Route::get('/produk/{slug}', [\App\Http\Controllers\Frontend\ProdukController::class, 'show'])
//     ->name('produk.detail');