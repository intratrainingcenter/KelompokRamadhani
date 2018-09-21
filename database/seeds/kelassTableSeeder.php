<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class kelassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('kelas')->insert([
        	[
        		'id_kelas'		=>	'1',
        		'kode_guru'		=>	'BI12',
        		'nama_kelas'	=>	'XII',
        		'jml_siswa'		=>	'32',
        		'created_at'	=>	Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at'	=>	Carbon::now()->format('Y-m-d H:i:s')
        	]
        ]);
    }
}
