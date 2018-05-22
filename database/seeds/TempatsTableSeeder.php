<?php

use Illuminate\Database\Seeder;
use App\Tempat;
class TempatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tempat::create([
        	'namatempat'=>'IF-101',
    	]);
    	Tempat::create([
        	'namatempat'=>'IF-102',
    	]);
    	Tempat::create([
        	'namatempat'=>'IF-103',
    	]);
    	Tempat::create([
        	'namatempat'=>'IF-104',
    	]);
    	Tempat::create([
        	'namatempat'=>'IF-105a',
    	]);
    	Tempat::create([
        	'namatempat'=>'IF-105b',
    	]);
    	Tempat::create([
        	'namatempat'=>'IF-106',
    	]);
    	Tempat::create([
        	'namatempat'=>'IF-108',
    	]);
    	Tempat::create([
        	'namatempat'=>'Plaza Mahasiswa',
    	]);
    	Tempat::create([
        	'namatempat'=>'Plaza Lama 1',
    	]);
    	Tempat::create([
        	'namatempat'=>'Plaza Lama 2',
    	]);
    	Tempat::create([
        	'namatempat'=>'Plaza Baru 1',
    	]);
    	Tempat::create([
        	'namatempat'=>'Plaza Baru 2',
    	]);
    	Tempat::create([
        	'namatempat'=>'Lapangan',
    	]);
    	Tempat::create([
        	'namatempat'=>'Aula Informatika',
    	]);
    	Tempat::create([
        	'namatempat'=>'Lab Pemrograman 1',
    	]);
    	Tempat::create([
        	'namatempat'=>'Lab Pemrograman 2',
    	]);
    	
    }
}
