<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['kode_guru','nama_kelas','jml_siswa'];

    public function detailguru()
    {
    	return $this->hasOne('App\guru','kode_guru','kode_guru');
    }
}
