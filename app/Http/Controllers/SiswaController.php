<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\siswa;

class SiswaController extends Controller
{
    public function index()
    {
        return view ('pages/content/skl/siswa');
    }

    public function add()
    {

    }
}
