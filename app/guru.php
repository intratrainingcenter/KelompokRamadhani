<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'gurus';
<<<<<<< HEAD
    protected $fillable = ['kode_guru','nama_guru','mapel'];
=======
    protected $primaryKey = 'id_guru';
    protected $fillable = ['id_guru','kode_guru','nama_guru','kode_mapel'];

>>>>>>> mapel&siswa
}
