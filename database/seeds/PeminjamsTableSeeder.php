<?php

use Illuminate\Database\Seeder;
use App\Peminjam;

class PeminjamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Peminjam::create([
        	'namapeminjam'=>'Ivanda Zevi Amalia',
            'rolepeminjam_id' => '4',
        	'nrp_nip'=>'5116100041',
            'nohp_peminjam'=>'081234431233',
    	]);
    }
}
