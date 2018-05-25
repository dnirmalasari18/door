<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    //
    protected $fillable = [
        'kegiatan_id', 
        'peminjam_id', 
        'tempat_id', 
        'namabooking', 
        'start_time', 
        'end_time',
        'status_id',
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
        return $this->hasOne('App\Status');
    }

}
