<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peminjam as peminjam;
use App\Tempat as tempat;
use App\Status as status;
class Booking extends Model
{
    //
    protected $table = 'bookings';
    protected $fillable = [
        'kegiatan_id', 'peminjam_id', 'tempat_id', 'namabooking', 'start_time', 'end_time','status_id',
    ];
    public function Peminjam(){
    	return $this->hasOne('peminjam');
    }
    public  function Kegiatan(){
    	return $this->belongsTo('App\Kegiatan','kegiatan_id','id');
    }
    public function Tempat(){
    	return $this->belongsTo('tempat');
    }
    public function Status(){
        return $this->hasOne('status');
    }

}
