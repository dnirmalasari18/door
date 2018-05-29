<?php

namespace App\Http\Controllers;
use App\User;
use App\Peminjam;
use App\Booking;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class TableController extends Controller
{
    public function destroyUser()
    {
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

            return redirect('/admin')->with('message', 'Admin has been added!');  	
    }

    public function storePeminjamBooking(Request $request){
        if (Peminjam::where('nrp_nip', '=', Input::get('nrp_nip'))->exists()) {
            $peminjam = Peminjam::select('id','nohp_peminjam')
                        ->where('nrp_nip', Input::get('nrp_nip'))
                        ->first();
            $hore=$peminjam->id;
            $hp= $peminjam->nohp_peminjam;

            echo $hore;

            if($hp!==Input::get('nohp_peminjam')){
                Peminjam::where('id', $hore)
                    ->update(['nohp_peminjam' => Input::get('nohp_peminjam')]);
            }       
        }

        else{
            $this->validate($request,[
                'rolepeminjam_id' => 'required|exists:rolepeminjams,id',
                'namapeminjam' => 'required|string|max:100|regex:/^[a-zA-Z-\'\s]+$/',
                'nrp_nip' => 'required|string|min:10|regex:[\d]',
                'nohp_peminjam' =>'required|string|min:11|max:13|regex:[\d]',
                'kegiatan_id'=>'required|exists:kegiatans,id',
                'tempat_id'=>'required|exists:tempats,id|integer|max:15',
                'namabooking' =>'required|string|max:100',
                'dateevent'=>'required|date|after:today',
                'start_time'=>'required|date_format:H:i| after:06:30| before:22:30',
                'end_time'=>'required|date_format:H:i|after:start_time| before:22:30',

            ],[
                'tempat_id.max'=> 'Want to book LP/LP2? Open <a target="blank" href="http://reservasi.lp.if.its.ac.id">LP</a> or <a target="blank" href="http://reservasi.lp2.if.its.ac.id">LP2</a>' ,
                'start_time.after' => 'It\'s too early to book a room',
                'start_time.before' => 'It\'s too late to book a room',
                'end_time.before' => 'It\'s too late to book a room',
                'end_time.after' => 'The end time must be a time after start time',
            ]);


            $tempat=Input::get('tempat_id');
            $date=Input::get('dateevent');
            $stime=Input::get('start_time');
            $etime=Input::get('end_time');

            $querrr = DB::select("SELECT * FROM `bookings` 
                        WHERE `tempat_id`=$tempat AND `dateevent`='$date' 
                        AND(`start_time`<='$stime' or `end_time`>='$stime') /*mulai-selese di tengah*/
                        and(`start_time`>='$etime' and `end_time`>='$etime') /*mulai lbh awal selese lbh awal*/
                        /*OR (`end_time`>='$stime' AND `end_time`<='$etime')/*mulai di tengah slesai akhir*/
                        /*OR(`start_time`<='$stime' AND `)
                        /*OR (`start_time`>='$stime' AND `end_time`>='$etime')*/
                        ");
            if (count($querrr)>1)
            {
                
               return redirect()->back()->withInput()->with('msg', 'You can\'t book that time');
            }
                $peminjam = new Peminjam;
                $peminjam->rolepeminjam_id = Input::get('rolepeminjam_id');
                $peminjam->namapeminjam     = Input::get('namapeminjam');
                $peminjam->nrp_nip = Input::get('nrp_nip');
                $peminjam->nohp_peminjam = Input::get('nohp_peminjam');
                $peminjam->save();
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
            
            $booking->save();
            return redirect('/bookHere')->with('msg', 'Automatically Accepted!');
        }

        else{
            $booking->status_id=1;
            if(empty($booking->image)){
                do {
                    $token_id =str_random(7);
                } 
                while (Booking::where("btoken", "=", $token_id) instanceof Booking);

                $booking->btoken=$token_id;
                $booking->save();
                return redirect('/bookHere')->with('message', $booking->btoken);
            }
        }
    }

    public function acceptBooking(Request $r,$id)
    {
        //dd($r);
        $book =Booking::find($id);
        if($r['action']==1){
            $book->status_id=2;
            $book->save();

            return redirect('bookedList')->with('message', 'Booking Form Accepted!');
        }
        else if ($r['action']==-1){
            $book->status_id=3;    
            $book->save();

            return redirect('bookedList')->with('message', 'Booking Form Rejected!');
        }    
    }

    public function awalUploadSurjin(Request $r){

        $this->validate($r,[
            'btoken' => 'required|string|min:7|max:7',
        ]);

        if (Booking::where('btoken','=',Input::get('btoken'))->exists()) {
            $booking = Booking::select('id','image')
                        ->where('btoken', Input::get('btoken'))
                        ->first();
            $yee=$booking->id;
            if(!is_null($booking->image)){
                return redirect('/confirm')->with('ololo','You already upload photo');
            }
            Session::put('key', $yee);
            return redirect('/confirm/upload');
        }
        else{
           return Redirect::back()
                ->withInput(Input::all())
                ->with('ololo', 'We can\'t find your booking');
        }
    } 


    public function uploadSurjin(Request $r){
        $value=Session::get('key');
        $this->validate($r,[
            'image'=>'required|image|mimes:jpeg,jpg,png|max:10000'
        ]);
 
       $r->file('image')->storeAs('public/images', $value.'.jpg');
        $file_name = $r->file('image');//->hashName();
        

        Booking::where('id',$value)
                ->update(['image' => $file_name]);

       
        return redirect('/confirm')
            ->with('ololo', 'Upload successfull');

      
    } 

}
