<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class gurusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gurus')->insert([
        	[
        		'id_guru'     =>  '1',
                'kode_guru'   =>  'BI12',
                'nama_guru'   =>  'Drs.Debo',
                'mapel'       =>  'B.Inggris',
                'created_at'    =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
        	]
        ]);
    }
}
