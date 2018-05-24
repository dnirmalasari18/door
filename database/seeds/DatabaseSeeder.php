<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('TempatsTableSeeder');
        $this->call('KegiatansTableSeeder');
        $this->call('RolePeminjamsTableSeeder');
        $this->call('PeminjamsTableSeeder');
        $this->call('StatussTableSeeder');
        $this->call('UsersTableSeeder');

    }
}
