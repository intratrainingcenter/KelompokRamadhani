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

// Route::prefix('siswa')->group(function (){
    
// });
Route::prefix('sekolah')->group(function (){
    route::post('add', 'MapelController@add')->name('sekolah.add');
    route::delete('delete', 'MapelController@delete')->name('sekolah.delete');
    route::put('edit', 'MapelController@edit')->name('sekolah.edit');

    route::post('addsiswa', 'SiswaController@addsiswa')->name('addsiswa');
    route::delete('deletesiswa', 'SiswaController@deletesiswa')->name('deletesiswa');
    route::put('editsiswa', 'SiswaController@editsiswa')->name('editsiswa');

    route::post('addguru', 'GuruController@addguru')->name('addguru');
    route::delete('deleteguru', 'GuruController@deleteguru')->name('deleteguru');
    route::put('editguru', 'GuruController@editguru')->name('editguru');

});

Route::prefix('KLS')->group(function(){
	route::delete('delete', 'KelasController@delete')->name('delete');
	route::post('add', 'KelasController@add')->name('add');
    route::put('update', 'KelasController@edit')->name('update');
});

Route::prefix('PKT')->group(function(){
	route::post('add', 'PiketController@add')->name('add');
	route::delete('delete', 'PiketController@delete')->name('delete');
    route::put('update', 'KelasController@edit')->name('update');
});

