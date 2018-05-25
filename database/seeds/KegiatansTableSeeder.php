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
        Kegiatan::create([
            'namakegiatan'=>'Asistensi/Sesi Lab',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Seminar',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Pelatihan',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Kuliah Tamu',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Perlombaan',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Kelas Pengganti',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Kegiatan Lain-Lain Himpunan',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Kegiatan Lain-Lain Bem Fakultas',
        ]);
        Kegiatan::create([
            'namakegiatan'=>'Kegiatan Lain-Lain BSO Informatika',
        ]);
    }
}
