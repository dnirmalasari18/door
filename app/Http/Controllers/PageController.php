<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempat;

class PageController extends Controller
{
    public function homepage(){
    	$awal = 'Welcome to Door! A reservation website for Informatics Department';
    	//return view ('home', compact('awal'));
    	return view ('home')->with('awal',$awal);
    }
    public function jadwalpage(){
    	$tempats=Tempat::all();
    	return view ('jadwal')-> with('tempats',$tempats);
    }
}
