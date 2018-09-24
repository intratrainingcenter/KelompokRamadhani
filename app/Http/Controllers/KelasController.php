<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
use App\guru;

class KelasController extends Controller
{
    public function index()
    {
    	$data = kelas::with(['detailguru'])->get();
        return view ('pages/content/skl/kelas', compact('data'));
    }

    public function delete(Request $request)
    {
        // dd($request->all());
    	$hapus = kelas::where('id_kelas',$request->id);
    	$hapus->delete();
        // dd($delete);

    	return redirect('kelas');
    }

    public function add(Request $request)
    {
        $tabel = new kelas;
        $tabel->kode_guru    =  $request->kode_guru;
        $tabel->nama_kelas   =  $request->nama_kelas;
        $tabel->jml_siswa    =  $request->jml_siswa;
        $tabel->orderBy('id_kelas DESC');
        $tabel->save();

        return redirect('kelas');
    }
}
