<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\mapel;

class MapelController extends Controller
{
    public function index()
    {
        // $mapel = mapel::all();
        $mapel = DB::table('mapels')->select('*')->orderBy('id_mapel','DESC')->get();
        // dd($mapel);
        return view ('pages/content/skl/mapel',['mapel'=>$mapel]);
    }

    public function add(Request $request)
    {
        // dd($request);

          $tabel = new mapel;
          $tabel->kode_guru = $request->kode_guru;
          $tabel->kode_mapel = $request->kode_mapel;
          $tabel->mapel = $request->mapel;
          $tabel->nkm = $request->nkm;
          $tabel->orderBy('id_mapel DESC');
          $tabel->save();

          

        //   dd($tabel);
            return redirect('mapel');

    }
    
    public function delete(Request $request)
    {
        // dd($request);
        $hapus = mapel::where('id_mapel',$request->id);
        $hapus->delete();

        return redirect('mapel');

    }

    public function edit(Request $request)
    {
        // dd($request);
        $update = mapel::find($request->id);
        $update->kode_guru = $request->kode_guru;
        $update->kode_mapel = $request->kode_mapel;
        $update->mapel = $request->mapel;
        $update->nkm = $request->nkm;
        $update->save();

      return redirect('mapel');


    }
}
