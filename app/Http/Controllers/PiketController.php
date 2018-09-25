<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadpiket;

class PiketController extends Controller
{
    public function index()
    {
    	$data = jadpiket::all();
        return view ('pages/content/skl/piket', compact('data'));
    }

    public function add(Request $request)
    {
    	$table = new jadpiket;
    	$table->kode_piket = $request->kode_piket;
    	$table->hari = $request->hari;
    	$table->orderBy('id DESC');
    	$table->save();

    	return redirect('piket');
    }

    public function delete(Request $request)
    {
    	$hapus = jadpiket::where('id', $request->id);
    	$hapus->delete();

    	return redirect('piket');
    }
}
