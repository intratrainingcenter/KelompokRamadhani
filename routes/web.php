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
Route::resource('detabsen', 'AbsenController');


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
	route::delete('deletekelas', 'KelasController@delete')->name('deletekelas');
	route::post('addkelas', 'KelasController@add')->name('addkelas');
    route::put('updatekelas', 'KelasController@edit')->name('updatekelas');
});

Route::prefix('PKT')->group(function(){
	route::post('add', 'PiketController@add')->name('add');
	route::delete('delete', 'PiketController@delete')->name('delete');
    route::put('update', 'PiketController@edit')->name('update');
    route::get('detail', 'PiketController@detail')->name('detail');
    route::get('show/{id}', 'PiketController@showdata')->name('show');
});

Route::prefix('ABS')->group(function(){
    route::get('detail', 'AbsenController@detail')->name('ABS.detail');
    route::post('adddetail', 'AbsenController@add')->name('adddetail');
    route::get('list', 'AbsenController@list')->name('ABS.list');
    route::put('editlist','AbsenController@editlist')->name('editlist');

});