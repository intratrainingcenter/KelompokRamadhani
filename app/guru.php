<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'gurus';
    protected $fillable = ['kode_guru','nama_guru','mapel'];
}
