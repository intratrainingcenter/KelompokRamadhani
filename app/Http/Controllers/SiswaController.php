<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\siswa;
use App\jadpiket;
use App\kelas;

class SiswaController extends Controller
{
    public function index()
    {
        $kelas = kelas::all();
        $picket = jadpiket::all();
        $student = DB::table('siswas')
        ->join('kelas','siswas.kode_kelas','=','kelas.id')
        ->select('siswas.*','kelas.*')->orderBy('id_siswa','DESC')->get();
        return view ('pages/content/skl/siswa',['siswa'=>$student,'jadpiket'=>$picket,'class'=>$kelas]);
    }

    public function addsiswa(Request $request)
    {
        // dd($request);
        $cek = siswa::where('NIS','=',$request->NIS)->doesntExist();  
        if($cek == true)        
        {
          $table = new siswa;
          $table->NIS = $request->NIS;
          $table->nama_siswa = $request->nama_siswa;
          $table->jk = $request->jk;
          $table->kode_kelas = $request->kode_kelas;
          $table->kode_piket = $request->kode_piket;
          $table->alamat = $request->alamat;
          $table->orderBy('id_siswa', 'DESC');
          $table->save();
          return redirect()->route('siswa.index')->with('yeah','Add new data success');
        }
        else{
            return redirect()->route('siswa.index')->with('update','NIS is already exists'); 
        }
    }
    
    public function deletesiswa(Request $request)
    {
        // dd($request);
        $delete = siswa::where('id_siswa',$request->id);
        $delete->delete();

        return redirect('siswa')->with('yeah','Deleting data success');

    }

    public function editsiswa(Request $request)
    {
        // dd($request);
        $update = siswa::find($request->id);
        $update->nama_siswa = $request->nama_siswa;
        $update->jk = $request->jk;
        $update->kode_kelas = $request->kode_kelas;
        $update->kode_piket = $request->kode_piket;
        $update->alamat = $request->alamat;
        $update->save();

      return redirect('siswa')->with('yeah','Update data success');

    }
}
