<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\absensi;
use App\kelas;
use App\siswa;

class AbsenController extends Controller
{
    public function index()
    {
    	$class = kelas::with('detailguru')->get();
        return view ('pages/content/skl/absen', compact('class'));
    }

    public function detail(Request $request)
    {
    	$detail = kelas::find($request->id);
    	return view ('pages/content/skl/detailabsen', compact('detail'));
    }
}
