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

            return redirect()->route('mapel.index')->with('yeah','Add new data success');
        }
        else{
            return redirect()->route('mapel.index')->with('update','your Code is already exists');            
        }

    }
    
    public function delete(Request $request)
    {
        // dd($request);
        $cek = DB::table('gurus')
            ->join('mapels', 'gurus.kode_mapel', '=', 'mapels.kode_mapel')
            ->select('mapels.*','gurus.*')
            ->where('gurus.kode_mapel',$request->kode)
            ->doesntExist();
        // dd($cek);
        if($cek == true)
        {
        // dd($request);
        $delete = mapel::where('kode_mapel',$request->kode);
        $delete->delete();

        return redirect()->route('mapel.index')->with('yeah','Deleting data success');
        }
        else{

        return redirect()->route('mapel.index')->with('update','Code is already use in another table');

        }

    }

    public function edit(Request $request)
    {
        // dd($request);
       
        $update = mapel::find($request->id);
        $update->mapel = $request->mapel;
        $update->nkm = $request->nkm;
        $update->save();

            return redirect()->route('mapel.index')->with('yeah','Update data success');
       



    }
}
