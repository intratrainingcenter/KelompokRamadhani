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
        $picket = jadpiket::all();
        $student = DB::table('siswas')->select('siswas.*')->orderBy('id_siswa','DESC')->get();
        return view ('pages/content/skl/siswa',['siswa'=>$student,'jadpiket'=>$picket]);
    }

    public function addsiswa(Request $request)
    {
        $cek =mapel::where('kode_mapel','=',$request->kode_mapel)->doesntExist();  
        if($cek == true)        
        {
          $table = new siswa;
          $table->NIS = $request->NIS;
          $table->nama_siswa = $request->nama_siswa;
          $table->kode_kelas = $request->kode_kelas;
          $table->kode_piket = $request->kode_piket;
          $table->alamat = $request->alamat;
          $table->orderBy('id_siswa', 'DESC');
          $table->save();
            return redirect('siswa');
        }
        else{
            return redirect('siswa');
        }
    }
    
    public function deletesiswa(Request $request)
    {
        // dd($request);
        $delete = siswa::where('id_siswa',$request->id);
        $delete->delete();

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
