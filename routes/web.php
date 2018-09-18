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

Route::resource('siswa', 'SiswaController');
Route::resource('kelas', 'KelasController');
Route::resource('absen', 'AbsenController');
Route::resource('mapel', 'MapelController');
Route::resource('piket', 'PiketController');

