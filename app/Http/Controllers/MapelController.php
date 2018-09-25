<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\mapel;
use App\guru;


class MapelController extends Controller
{
    public function index()
    {
        $mapel = DB::table('mapels')->select('*')->orderBy('id_mapel','DESC')->get();
        // dd($mapel);
        return view ('pages/content/skl/mapel',['mapel'=>$mapel]);
    }

    public function add(Request $request)
    {
        $cek =mapel::where('kode_mapel','=',$request->kode_mapel)->doesntExist();
        // dd($cek);
        if($cek == true)
        {
          $tabel = new mapel;
          $tabel->kode_mapel = $request->kode_mapel;
          $tabel->mapel = $request->mapel;
          $tabel->nkm = $request->nkm;
          $tabel->orderBy('id_mapel DESC');
          $tabel->save();

            return redirect('mapel');
        }
        else{
            return redirect('mapel');
        }

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
        $cek =mapel::where('kode_mapel','=',$request->kode_mapel)->doesntExist();
        
        if($cek == true)
        {
        $update = mapel::find($request->id);
        $update->mapel = $request->mapel;
        $update->nkm = $request->nkm;
        $update->save();

        return redirect('mapel');
        }
        else{

        return redirect('mapel');

        }



    }
}
