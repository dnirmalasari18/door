<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage(){
    	$awal = 'Welcome to Door! A reservation website for Informatics Department';
    	//return view ('home', compact('awal'));
    	return view ('home')->with('awal',$awal);
    }
    public function jadwalpage(){
    	return view ('jadwal');
    }
}
