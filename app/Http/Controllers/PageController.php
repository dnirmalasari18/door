<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempat;

class PageController extends Controller
{
    public function homepage(){
    	//return view ('home', compact('awal'));
    	return view ('main');
    }
    public function jadwalpage(){
    	$tempats=Tempat::all();
    	return view ('jadwal')-> with('tempats',$tempats);
    }
    public function contactpage(){
    	return view ('contact');
    }

    public function bookinghere(){
        return view('bookhere');
    }
    
}
