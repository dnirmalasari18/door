<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
        	'name'=>'Admin Wadidaw',
        	'username'=>'adminhehe',
        	'password'=>bcrypt('fpdoor'),
            'role'=>'master',
    	]);

        User::create([
            'name'=>'Admin Bukan Mastah',
            'username'=>'admin1',
            'password'=>bcrypt('fpdoor'),
        ]);
        User::create([
            'name'=>'Admin Siapa ya',
            'username'=>'admin2',
            'password'=>bcrypt('fpdoor'),
        ]);
        User::create([
            'name'=>'Admin Aduh',
            'username'=>'admin3',
            'password'=>bcrypt('fpdoor'),
        ]);
        User::create([
            'name'=>'Admin Gabut',
            'username'=>'admin4',
            'password'=>bcrypt('fpdoor'),
        ]);
    }
}
