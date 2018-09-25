<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\siswa;

class SiswaController extends Controller
{
    public function index()
    {
        // $mapel = mapel::all();
        $siswa = DB::table('siswas')->select('*')->orderBy('id_siswa','DESC')->get();
        // dd($mapel);
        return view ('pages/content/skl/siswa',['siswa'=>$siswa]);
    }

    public function addsiswa(Request $request)
    {
        // dd($request);

          $tabel = new siswa;
          $tabel->NIS = $request->NIS;
          $tabel->nama_siswa = $request->nama_siswa;
          $tabel->kode_kelas = $request->kode_kelas;
          $tabel->alamat = $request->alamat;
          $tabel->orderBy('id_siswa', 'DESC');
          $tabel->save();

          

        //   dd($tabel);
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
        $update->alamat = $request->alamat;
        $update->save();

      return redirect('siswa');


    }
}
