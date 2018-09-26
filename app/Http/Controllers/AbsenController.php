<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // dd($request);
        $stud = siswa::where('kode_kelas',$request->id)->get();
        // dd($stud);
// dd($up);
        // return view ('pages/content/skl/detailabsen', compact('detail'));
        return view ('pages/content/skl/detailabsen',['detail'=>$stud]);
    }
    public function add(Request $request)
    {
        // dd($request);
          $table = new absensi;
          $table->NIS = $request->NIS;
          $table->kode_kelas = $request->kode_kelas;
          $table->keterangan = $request->ket;
          $table->save();

        //   return 'ahaha';

          return redirect('absen');

    }
}
