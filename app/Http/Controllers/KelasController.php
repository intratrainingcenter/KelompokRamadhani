<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
// use App\guru;

class KelasController extends Controller
{
    public function index()
    {
    	$data = kelas::all();
    	// dd($data);
        return view ('pages/content/skl/kelas', compact('data'));
    }
}
