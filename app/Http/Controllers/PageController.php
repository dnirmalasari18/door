<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use App\Booking;
use App\Kegiatan;
use App\RolePeminjam;
use App\Status;
use App\Tempat;

class PageController extends Controller
{
    public function homepage(){
    	//return view ('home', compact('awal'));
    	return view ('main');
    }
    public function jadwalpage(){
    	$tempats=Tempat::all();
        $bookings=Booking::all();
        $statuss=Status::all();
        $rolepminjams=RolePeminjam::all();
        $kegiatans=Kegiatan::all();
        $peminjams=Peminjam::all();
        return view('jadwal')->with('bookings',$bookings)->with('statuss',$statuss)->with('tempats',$tempats)->with('rolepeminjams',$rolepminjams)->with('kegiatans',$kegiatans)->with('peminjams',$peminjams);
    }
    public function contactpage(){
    	return view ('contact');
    }

    public function bookinghere(){
        return view('bookhere');
    }

    public function confirm(){
        return view('perijinan');
    }
    
}
