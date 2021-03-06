<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Peminjam;
use App\Booking;
use App\Kegiatan;
use App\RolePeminjam;
use App\Status;
use App\Tempat;
use Auth;
use Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function accepting(){
        $bookings=Booking::all();
        $statuss=Status::all();
        $tempats=Tempat::all();
        $rolepminjams=RolePeminjam::all();
        $kegiatans=Kegiatan::all();
        $peminjams=Peminjam::all();
        return view('admin.accept')->with('bookings',$bookings)->with('statuss',$statuss)->with('tempats',$tempats)->with('rolepeminjams',$rolepminjams)->with('kegiatans',$kegiatans)->with('peminjams',$peminjams);
    }
     public function jadwaladminpage(){
        $tempats=Tempat::all();
        $bookings=Booking::all();
        $statuss=Status::all();
        $rolepminjams=RolePeminjam::all();
        $kegiatans=Kegiatan::all();
        $peminjams=Peminjam::all();
        return view('admin.jadwaladmin')->with('bookings',$bookings)->with('statuss',$statuss)->with('tempats',$tempats)->with('rolepeminjams',$rolepminjams)->with('kegiatans',$kegiatans)->with('peminjams',$peminjams);
    }
    public function adminpage(){
        $users=User::all();
        return view('admin.admin')->with('users',$users);
    }
    public function tambahadminpage(){
        return view('admin.tambahadmin');
    }

    public function showChangePassword(){
        return view('auth.gantipass');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }
}
