<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    //
    protected $fillable = [
        'kegiatan_id', 
        'peminjam_id', 
        'tempat_id', 
        'namabooking',
        'dateevent', 
        'start_time', 
        'end_time',
        'image',
        'btoken',
        'status_id',
    ];



    protected $time=[
        'start_time',
        'end_time'
    ];


    public function Peminjam(){
    	return $this->belongsTo('App\Peminjam','peminjam_id','id');
    }
    public  function Kegiatan(){
    	return $this->belongsTo('App\Kegiatan','kegiatan_id','id');
    }
    public function Tempat(){
    	return $this->belongsTo('App\Tempat','tempat_id','id');
    }
    public function Status(){
        return $this->belongsTo('App\Status','status_id','id');
    }

}
