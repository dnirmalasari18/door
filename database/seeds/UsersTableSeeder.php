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
        	'email'=>'admin1@email.com',
        	'password'=>bcrypt('fpdoor'),
            'role'=>'master',
    	]);

        User::create([
            'name'=>'Admin Bukan Mastah',
            'username'=>'admin1',
            'email'=>'adminnnn@email.com',
            'password'=>bcrypt('fpdoor'),
        ]);
    }
}
