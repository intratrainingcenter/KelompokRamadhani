<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'gurus';
    protected $primaryKey = 'id_guru';
    protected $fillable = ['id_guru','kode_guru','nama_guru','jk','kode_mapel'];

}
