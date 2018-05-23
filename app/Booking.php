<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peminjam as peminjam;
use App\Kegiatan as kegiatan;
use App\Tempat as tempat;
class Booking extends Model
{
    //
    protected $table = 'bookings';

    public function Peminjam(){
    	return $this->hasOne('peminjam');
    }
    public  function Kegiatan(){
    	return $this->hasOne('kegiatan');
    }
    public function Tempat(){
    	return $this->hasOne('tempat');
    }
}
