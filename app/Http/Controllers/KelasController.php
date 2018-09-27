<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
use App\guru;

class KelasController extends Controller
{
    public function index()
    {
    	$data = kelas::with('detailguru')->get();
        $guru = guru::all();
        // dd($guru);
        return view ('pages/content/skl/kelas', compact('data','guru'));
    }

    public function delete(Request $request)
    {
        // dd($request->all());
    	$hapus = kelas::where('id',$request->id);
    	$hapus->delete();
        // dd($delete);

    	return redirect('kelas')->with('yeah','Deleting data success');
    }

    public function add(Request $request)
    {
        $cek = kelas::where('nama_kelas',$request->nama_kelas)->doesntExist(); 
        // dd($cek);
        if($cek == true)
        {
        $table = new kelas;
        $table->kode_guru    =  $request->kode_guru;
        $table->nama_kelas   =  $request->nama_kelas;
        $table->jml_siswa    =  $request->jml_siswa;
        $table->orderBy('id_kelas DESC');
        $table->save();

        return redirect('kelas')->with('yeah','Add new data success');
        }
        else{
            return redirect('kelas')->with('update','Name Class is already exists'); 

        }
    }

    public function edit(Request $request)
    {
        $update = kelas::find($request->id);
        $update->update([
            'kode_guru' =>  $request->kode_guru,
            'nama_kelas'=>  $request->nama_kelas,
            'jml_siswa' =>  $request->jml_siswa
        ]);

        return redirect('kelas')->with('yeah','Update data success');

       
    }
}
