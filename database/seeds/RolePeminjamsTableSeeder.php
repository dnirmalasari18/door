<?php

use Illuminate\Database\Seeder;
use App\RolePeminjam;
class RolePeminjamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	RolePeminjam::create([
        	'namarole'=>'Dosen',
        ]);
        RolePeminjam::create([
        	'namarole'=>'Mahasiswa',
        ]);
    }
}
