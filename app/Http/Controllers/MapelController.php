<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapel;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = mapel::all();
        return view ('pages/content/skl/mapel',['mapel'=>$mapel]);
    }

    public function add(){
         $tabel = new mapel;
          $tabel->nama_supplier = $request->nama_supplier;
          $tabel->pt_supplier = $request->pt_supplier;
          $tabel->alamat_supplier = $request->alamat_supplier;
          $tabel->contact_supplier = $tlp;
          $tabel->save();

            return redirect('pages/conten/skl/mapel');

    }
}
