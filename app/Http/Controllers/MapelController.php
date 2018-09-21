<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapel;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = mapel::all(DESC);
        
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

    public function edit(Reuqest $request)
    {

    }
}
