<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['id_siswa','NIS','nama_siswa','kode_kelas','kode_piket','alamat','jk'];

    public function detailguru()
    {
    	return $this->hasOne('App\jadpiket','kode_piket');
    }
}
