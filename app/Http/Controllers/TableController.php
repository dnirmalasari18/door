<?php

namespace App\Http\Controllers;
use App\User;
use App\Peminjam;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class TableController extends Controller
{
    public function destroyUser()
    {
        // delete
        $admin =User::find(Input::get('user_id'));
        $admin->delete();

        return redirect('/admin')->with('message', 'Admin has been deleted!');
    }

    public function storeUser(Request $request)
    {
      	$this->validate($request,[
      		'name' => 'required|string|max:255|regex:/^[a-zA-Z-\'\s]+$/',
            'username' => 'required|string|max:20|min:5|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
      	]);

            $admin = new User;
            $admin->name     = Input::get('name');
            $admin->username = Input::get('username');
            $admin->password = bcrypt(Input::get('password'));
            $admin->save();

            // redirect
            return redirect('/admin')->with('message', 'Admin has been added!');  	
    }

    public function storePeminjamBooking(Request $request){
        if (Peminjam::where('nrp_nip', '=', Input::get('nrp_nip'))->exists()) {
            $peminjam = Peminjam::select('id')
                        ->where('nrp_nip', Input::get('nrp_nip'))
                        ->first();
            $hore= $peminjam->id;
                
        }
        else{
            $this->validate($request,[
                'rolepeminjam_id' => 'required|exists:rolepeminjams,id',
                'namapeminjam' => 'required|string|max:100|regex:/^[a-zA-Z-\'\s]+$/',
                'nrp_nip' => 'required|string|min:10|regex:[\d]',
                'nohp_peminjam' =>'required|string|min:11|max:13regex:[\d]',
                'kegiatan_id'=>'required|exists:kegiatans,id',
                'tempat_id'=>'required|exists:tempats,id|integer|max:15',
                'namabooking' =>'required|string|max:100',
                'dateevent'=>'required|date|after:today',
                'start_time'=>'required|date_format:H:i',
                'end_time'=>'required|date_format:H:i|after:start_time',

            ],[
                'tempat_id.max'=> 'Want to book LP/LP2? Open <a target="blank" href="http://reservasi.lp.if.its.ac.id">LP</a> or <a target="blank" href="http://reservasi.lp2.if.its.ac.id">LP2</a>' ,
            ]);

                $peminjam = new Peminjam;
                $peminjam->rolepeminjam_id = Input::get('rolepeminjam_id');
                $peminjam->namapeminjam     = Input::get('namapeminjam');
                $peminjam->nrp_nip = Input::get('nrp_nip');
                $peminjam->nohp_peminjam = Input::get('nohp_peminjam');
                $peminjam->save();
                //echo $peminjam['id'];
                $hore=$peminjam->id;
        }

        $booking = new Booking;
        $booking->kegiatan_id =Input::get('kegiatan_id');
        $booking->peminjam_id = $hore;
        $booking->tempat_id = Input::get('tempat_id');
        $booking->namabooking = Input::get('namabooking');
        $booking->dateevent = Input::get('dateevent');
        $booking->start_time = Input::get('start_time');
        $booking->end_time = Input::get('end_time');

        if($peminjam['rolepeminjam_id']==='1'){
            $booking->status_id=2;
        }
        else{
            $booking->status_id=1;
        }

        $booking->save();

            // redirect
        return redirect('/bookHere')->with('message', 'Booked!');
    }

    public function acceptBooking(Request $r,$id)
    {
        //dd($r);
        //echo $id;
        //echo $r['action'];
        $book =Booking::find($id);
        if($r['action']==1){
            $book->status_id=2;
        //    echo "keganti";
        }
        else if ($r['action']==-1){
            $book->status_id=3;    
        //    echo "hmm";
        }
        $book->save();

        return redirect('bookedList')->with('message', 'Succesful!');
    }
    
}
