<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadpiket;
use App\kelas;
use App\siswa;

class PiketController extends Controller
{
    public function index()
    {
        $data = jadpiket::all();
    	$kelas = kelas::all();
    	// dd($data);
        return view ('pages/content/skl/piket', compact('data','kelas'));
    }

    public function add(Request $request)
    {
        $cek = jadpiket::where('kode_piket', $request->kode_piket)->doesntExist();
        if($cek == true)
        {
    	   $table = new jadpiket;
    	   $table->kode_piket = $request->kode_piket;
    	   $table->hari = $request->hari;
    	   $table->orderBy('id DESC');
    	   $table->save();

    	   return redirect('piket')->with('yeah','Add new data success');
        }else{
            return redirect('piket')->with('update','Name Class is already exists');
        }
    }

    public function delete(Request $request)
    {
    	$hapus = jadpiket::where('id', $request->id);
    	$hapus->delete();

    	return redirect('piket');
    }

    public function edit(Request $request)
    {
    	$update = jadpiket::find($request->id);
    	$update->update([
    		'kode_piket'	=>	$request->kode_piket,
    		'hari'			=>	$request->hari
    	]);

    	return redirect('piket')->with('yeah','Update data success');
    }

    public function detail(Request $request)
    {
        $detail = kelas::find($request->id);
        $siswa = siswa::all();

        return redirect('piket');
    }

    public function showdata(Request $request, $id)
    {
        // dd($request);
        $siswa = siswa::where([
                            ['kode_kelas',$id],
                            ['kode_piket',$request->kode]
                            ])->get();
                        // dd($siswa);

        return $siswa;
    }
}
