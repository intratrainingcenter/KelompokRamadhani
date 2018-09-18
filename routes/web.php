<?php
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return view('pages/content/home') ;
});

Route::get('/para/{id}', function ($id) {
    return $id;
});
Route::resource('middle', 'ctrControler')->middleware('defend');

Route::resource('control', 'ctrControler');

Route::resource('Skl', 'SklController');

Route::get('/siswa', function () {
    return view('pages/content/skl/siswa');
});
Route::get('/kelas', function () {
    return view('pages/content/skl/kelas');
});
Route::get('/absen', function () {
    return view('pages/content/skl/absen');
});
Route::get('/mapel', function () {
    return view('pages/content/skl/mapel');
});
Route::get('/piket', function () {
    return view('pages/content/skl/piket');
});

