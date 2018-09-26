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
        $object = DB::table('mapels')->select('*')->orderBy('id_mapel','DESC')->get();
        // dd($mapel);
        return view ('pages/content/skl/mapel',['mapel'=>$object]);
    }

    public function add(Request $request)
    {
        $cek =mapel::where('kode_mapel','=',$request->kode_mapel)->doesntExist();
        // dd($cek);
        if($cek == true)

        {
          $table = new mapel;
          $table->kode_mapel = $request->kode_mapel;
          $table->mapel = $request->mapel;
          $table->nkm = $request->nkm;
          $table->orderBy('id_mapel DESC');
          $table->save();

            return redirect()->route('mapel.index')->with('yeah','add new data is success');
        }
        else{
            return redirect('mapel');
        }

    }
    
    public function delete(Request $request)
    {
        // dd($request);
        $delete = mapel::where('id_mapel',$request->id);
        $delete->delete();

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
