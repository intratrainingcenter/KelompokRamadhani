<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\guru;
use App\mapel;


class GuruController extends Controller
{
    public function index()
    {
        $data = mapel::all();
        $guru = DB::table('gurus')
        ->join('mapels','gurus.kode_mapel','=','mapels.kode_mapel')
        ->select('mapels.*','gurus.*')
        ->orderBy('id_guru','DESC')->get();
        // dd($mapel);
        return view ('pages/content/skl/guru',['guru'=>$guru,'data'=>$data]);
    }

    public function addguru(Request $request)
    {
        // dd($request);
        $cek =mapel::where('kode_mapel','=',$request->kode_mapel)->doesntExist();
        // dd($cek);
        if($cek == true)
        {
          $table = new guru;
          $table->kode_guru = $request->kode_guru;
          $table->nama_guru = $request->nama_guru;
          $table->kode_mapel = $request->kode_mapel;
          $table->orderBy('id_guru', 'DESC');
          $table->save();
          
            return redirect('guru');
        }
        else{
            return redirect('guru');

        }

    }
    
    public function deleteguru(Request $request)
    {
        // dd($request);
        $hapus = guru::where('id_guru',$request->id);
        $hapus->delete();

        return redirect('guru');

    }

    public function editguru(Request $request)
    {
        // dd($request);
        $update = guru::find($request->id);
        $update->kode_guru = $request->kode_guru;
        $update->nama_guru = $request->nama_guru;
        $update->kode_mapel = $request->kode_mapel;
        $update->save();

      return redirect('guru');


    }
}
