<?php

use App\Models\Criteria;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\UsersController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SubcriteriaController;
use App\Http\Middleware\is_user;
use App\Models\subcriteria;

//route group untuk guest
Route::middleware('guest')->group(function(){
    //route untuk landingpage
    Route::get('/', [LandingPageController::class, 'index']) ->name('landing');

    //route untuk sign in
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

    //route untuk register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register',[AuthController::class, 'store'])->name('register.store');
});

//route group untuk auth
Route::middleware('auth')->group(function(){
    //route untuk dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

     //routing untuk kriteria
    Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria')->middleware('is_user:user,admin');
    Route::post('/criteria', [CriteriaController::class, 'store'])->name('criteria.simpan')->middleware('is_user:user,admin');
    Route::put('/criteria/edit', [CriteriaController::class, 'update'])->name('criteria.edit')->middleware('is_user:user,admin');
    Route::delete('/criteria/delete', [CriteriaController::class, 'delete'])->name('criteria.delete')->middleware('is_user:user,admin');
    Route::post('/criteria/laporan', [CriteriaController::class, 'exportPDF'])->name('criteria.laporan')->middleware('is_kepala:admin,kepala cabang');
    // Route::get('/criteria/laporan/download', [CriteriaController::class, 'exportPDF2'])->name('dowexportPdfCriteria')->middleware('is_kepala:admin,kepala cabang');

    //routing untuk subcriteria
    Route::get('/subcriteria', [SubcriteriaController::class,'index'])->name('subcriteria');
    Route::post('/subcriteria/tambah', [SubcriteriaController::class,'store'])->name('subcriteria.simpan');

    //routing untuk alternative
    Route::get('/alternative', [AlternativeController::class, 'index'])->name('alternative')->middleware('is_user:user,admin');
    Route::post('/alternative', [AlternativeController::class, 'store'])->name('alternative.simpan')->middleware('is_user:user,admin');
    Route::put('/altenative/edit', [AlternativeController::class, 'update'])->name('alternative.edit')->middleware('is_user:user,admin');
    Route::delete('/alternative/hapus', [AlternativeController::class, 'delete'])->name('alternative.delete')->middleware('is_user:user,admin');
    Route::post('/alternative/laporan', [AlternativeController::class, 'exportPDF'])->name('alternatives.laporan')->middleware('is_kepala:admin,kepala cabang');
    // Route::get('/alternative/laporan/download', [AlternativeController::class, 'exportPDF2'])->name('dowexportPdfAlternatives')->middleware('is_kepala:admin,kepala cabang');

    // routing untuk penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian')->middleware('is_user:user,admin');
    Route::get('/penilaian/form', [PenilaianController::class, 'getForms'])->name('penilaian.form')->middleware('is_user:user,admin');
    Route::put('/penilaian/edit', [PenilaianController::class, 'update'])->name('penilaian.edit')->middleware('is_user:user,admin');

    //routing untuk perhitungan
    Route::get('/perhitungan', [TopsisController::class, 'index'])->name('topsis')->middleware('is_user:user,admin');

    //routing untuk hasil perhitungan
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');
    Route::get('/hasil/detail', [HasilController::class, 'getForms'])->name('hasil.form');
    Route::post('/laporan', [HasilController::class, 'exportPDF'])->name('exportPdf')->middleware('is_kepala:admin,kepala cabang');
    // Route::get('/laporan/exportPDF', [HasilController::class, 'exportPDF2'])->name('dowexportPdf')->middleware('is_kepala:admin,kepala cabang');
    

    //routing untuk profile user
    Route::get('/profile', [userController::class,'index'])->name('profile');
    Route::post('/profile/update', [userController::class, 'update'])->name('profile.update');

    //routing untuk kelola data user
    Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware('is_admin:admin');
    Route::post('/users/simpan', [UsersController::class, 'store'])->name('users.simpan')->middleware('is_admin:admin');
    Route::put('/users/edit', [UsersController::class, 'update'])->name('users.edit')->middleware('is_admin:admin');
    Route::delete('/users/hapus', [UsersController::class, 'delete'])->name('users.delete')->middleware('is_admin:admin');

    //routing untuk laporan
    Route::get('/laporann', [HasilController::class, 'laporan'])->name('laporan')->middleware('is_kepala:admin,kepala cabang');
    
    //route untuk logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


