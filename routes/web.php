<?php
Auth::routes();


Route::get('/', function () {
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
Route::resource('guru', 'GuruController');

Route::prefix('sekolah')->group(function (){
    route::post('add', 'MapelController@add')->name('add');
    route::delete('delete', 'MapelController@delete')->name('delete');
    route::put('edit', 'MapelController@edit')->name('edit');

});

Route::prefix('KLS')->group(function(){
	route::delete('delete', 'KelasController@delete')->name('delete');
	route::post('add', 'KelasController@add')->name('add');
});

