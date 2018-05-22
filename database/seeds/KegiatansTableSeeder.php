<?php

use Illuminate\Database\Seeder;
use App\Kegiatan;

class KegiatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kegiatan::create([
        	'namakegiatan'=>'Kuliah',
    	]);
    	Kegiatan::create([
        	'namakegiatan'=>'Praktikum',
    	]);
    }
}
