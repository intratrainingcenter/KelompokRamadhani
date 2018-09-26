<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadpiket extends Model
{
    protected $table = 'jadpikets';
    protected $primarykey = 'id';
    protected $fillable = ['id','kode_piket','hari'];

    public function detailsiswa()
    {
    	return $this->hasmany('App\siswa','kode_piket','kode_piket');
    }
}
