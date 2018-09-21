<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $table = 'mapels';
    protected $primaryKey = 'id_mapel';
    protected $fillable = ['id_mapel','kode_guru','mapel','nkm'];

}
