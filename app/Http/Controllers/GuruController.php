<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\guru;


class GuruController extends Controller
{
    public function index()
    {
        // $mapel = mapel::all();
        $guru = DB::table('gurus')->select('*')->orderBy('id_guru','DESC')->get();
        // dd($mapel);
        return view ('pages/content/skl/guru',['guru'=>$guru]);
    }

    public function addguru(Request $request)
    {
        // dd($request);

          $tabel = new guru;
          $tabel->kode_guru = $request->kode_guru;
          $tabel->nama_guru = $request->nama_guru;
          $tabel->kode_mapel = $request->kode_mapel;
          $tabel->orderBy('id_guru', 'DESC');
          $tabel->save();

          

        //   dd($tabel);
            return redirect('guru');

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
