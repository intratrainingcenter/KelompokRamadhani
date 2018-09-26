<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $table = 'absensis';
    protected $primarykey = 'id';
    protected $fillable = ['id','kode_kelas','NIS','keterangan'];

    public function detailkelas()
    {
    	return $this->hasOne('App\kelas','kode_kelas','kode_kelas');
    }

    public function detailsiswa()
    {
    	return $this->hasOne('App\siswa','NIS','NIS');
    }
}
