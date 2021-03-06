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
        return view ('pages/content/skl/absen',['class'=>$class]);

    }

    public function detail(Request $request)
    {
        // dd($request);
        $student = siswa::where('kode_kelas',$request->id)->get();
        // dd($stud);
        return view ('pages/content/skl/detailabsen',['detail'=>$student]);
    }
    public function add(Request $request)
    {
        // dd($request);
        $date = date("Y-m-d");
        $cek = absensi::where('tgl',$date)->doesntExist();
        $cekNIS = absensi::where('NIS',$request->NIS)->doesntExist();
    
        if($cek == true)
        {
            if($cekNIS == true)
            {
                $table = new absensi;
                $table->NIS = $request->NIS;
                $table->tgl = $date;
                $table->kode_kelas = $request->kode;
                $table->keterangan = $request->ket;

                // dd($table);
                $table->save();
            
            return redirect('detabsen')->with('yeah','Sukses');
            }
            else
            {
                return redirect('detabsen')->with('warning','the student has been absent');
            }
        }
        else
        {
            if($cekNIS == true)
            {
                $table = new absensi;
                $table->NIS = $request->NIS;
                $table->tgl = $date;
                $table->kode_kelas = $request->kode;
                $table->keterangan = $request->ket;

                // dd($table);
                $table->save();
            
            return redirect('detabsen')->with('yeah','Sukses');
            }
            else
            {
                return redirect('detabsen')->with('warning','the student has been absent');
            }
        }
    }

    public function list(Request $request)
    {
        // dd($request);
          $student = DB::table('absensis')
          ->join('siswas','absensis.NIS','=','siswas.NIS')
          ->join('kelas','absensis.kode_kelas','=','kelas.id')
          ->select('absensis.*','siswas.nama_siswa','kelas.nama_kelas')
          ->where('absensis.kode_kelas',$request->id)
          ->orderBy('absensis.kode_kelas','DESC')
          ->get();
        // dd($stud);
        return view ('pages/content/skl/listabsen',['detail'=>$student]);
    }

    public function editlist(Request $request)
    {
        // dd($request);
        
        // dd($request);where('active', 1)
        DB::table('absensis')
            ->where('NIS', $request->id)
            ->update(['keterangan' => $request->keterangan]);

            $student = DB::table('absensis')
          ->join('siswas','absensis.NIS','=','siswas.NIS')
          ->join('kelas','absensis.kode_kelas','=','kelas.id')
          ->select('absensis.*','siswas.nama_siswa','kelas.nama_kelas')
          ->where('absensis.kode_kelas',$request->kode)
          ->orderBy('absensis.kode_kelas','DESC')
          ->get();
        
    //   return redirect('ABS.list');
      return view('pages/content/skl/listabsen',['detail'=>$student]);

    }
}
