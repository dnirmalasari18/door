<?php

use Illuminate\Database\Seeder;
use App\Status;
class StatussTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::create([
        	'namastatus'=>'Booking',
    	]);
    	Status::create([
        	'namastatus'=>'Accepted',
    	]);
    	Status::create([
        	'namastatus'=>'Canceled',
    	]);
    }
}
