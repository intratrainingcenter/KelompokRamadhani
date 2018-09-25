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
    	$hapus = kelas::where('id',$request->id);
    	$hapus->delete();
        // dd($delete);

    	return redirect('kelas');
    }

    public function add(Request $request)
    {
        $table = new kelas;
        $table->kode_guru    =  $request->kode_guru;
        $table->nama_kelas   =  $request->nama_kelas;
        $table->jml_siswa    =  $request->jml_siswa;
        $table->orderBy('id_kelas DESC');
        $table->save();

        return redirect('kelas');
    }

    public function edit(Request $request)
    {
        $update = kelas::find($request->id);
        $update->update([
            'kode_guru' =>  $request->kode_guru,
            'nama_kelas'=>  $request->nama_kelas,
            'jml_siswa' =>  $request->jml_siswa
        ]);

        return redirect('kelas');
    }
}
