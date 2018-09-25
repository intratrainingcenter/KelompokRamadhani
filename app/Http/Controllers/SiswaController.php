<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\siswa;
use App\jadpiket;

class SiswaController extends Controller
{
    public function index()
    {
        $jadpiket = jadpiket::all();
        $siswa = DB::table('siswas')->select('siswas.*')->orderBy('id_siswa','DESC')->get();
        return view ('pages/content/skl/siswa',['siswa'=>$siswa,'jadpiket'=>$jadpiket]);
    }

    public function addsiswa(Request $request)
    {
        // dd($request);

          $tabel = new siswa;
          $tabel->NIS = $request->NIS;
          $tabel->nama_siswa = $request->nama_siswa;
          $tabel->kode_kelas = $request->kode_kelas;
          $tabel->kode_piket = $request->kode_piket;
          $tabel->alamat = $request->alamat;
          $tabel->orderBy('id_siswa', 'DESC');
          $tabel->save();
            return redirect('siswa');

    }
    
    public function deletesiswa(Request $request)
    {
        // dd($request);
        $hapus = siswa::where('id_siswa',$request->id);
        $hapus->delete();

        return redirect('siswa');

    }

    public function editsiswa(Request $request)
    {
        // dd($request);
        $update = siswa::find($request->id);
        $update->NIS = $request->NIS;
        $update->nama_siswa = $request->nama_siswa;
        $update->kode_kelas = $request->kode_kelas;
        $tabel->kode_piket = $request->kode_piket;
        $update->alamat = $request->alamat;
        $update->save();

      return redirect('siswa');


    }
}
