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
        $teacher = DB::table('gurus')
        ->join('mapels','gurus.kode_mapel','=','mapels.kode_mapel')
        ->select('mapels.*','gurus.*')
        ->orderBy('id_guru','DESC')->get();
        // dd($mapel);
        return view ('pages/content/skl/guru',['guru'=>$teacher,'data'=>$data]);
    }

    public function addguru(Request $request)
    {
        // dd($request);
        $cek =guru::where('kode_guru','=',$request->kode_guru)->doesntExist();
        // dd($cek);
        if($cek == true)
        {
          $table = new guru;
          $table->kode_guru = $request->kode_guru;
          $table->nama_guru = $request->nama_guru;
          $table->jk = $request->jk;
          $table->kode_mapel = $request->kode_mapel;
          $table->orderBy('id_guru', 'DESC');
          $table->save();
          
          return redirect()->route('guru.index')->with('yeah','Add new data success'); 
        }
        else{
            return redirect()->route('guru.index')->with('update','your Code is already exists');          

        }

    }
    
    public function deleteguru(Request $request)
    {
        // dd($request);
        $delete = guru::where('id_guru',$request->id);
        $delete->delete();

        return redirect()->route('guru.index')->with('yeah','Deleting data success');

    }

    public function editguru(Request $request)
    {
        // dd($request);
        $update = guru::find($request->id);
        $update->nama_guru = $request->nama_guru;
        $update->jk = $request->jk;
        $update->kode_mapel = $request->kode_mapel;
        $update->save();

        return redirect()->route('guru.index')->with('yeah','Update data success');


    }
}
