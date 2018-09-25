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
    route::post('add', 'MapelController@add')->name('add');
    route::delete('delete', 'MapelController@delete')->name('delete');
    route::put('edit', 'MapelController@edit')->name('edit');

    route::post('addsiswa', 'SiswaController@addsiswa')->name('addsiswa');
    route::delete('deletesiswa', 'SiswaController@deletesiswa')->name('deletesiswa');
    route::put('editsiswa', 'SiswaController@editsiswa')->name('editsiswa');

    route::post('addguru', 'GuruController@addguru')->name('addguru');
    route::delete('deleteguru', 'GuruController@deleteguru')->name('deleteguru');
    route::put('editguru', 'GuruController@editguru')->name('editguru');

});

