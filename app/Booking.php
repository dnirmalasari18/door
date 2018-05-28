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

/*    public function scopeBetween($query, Carbon $from, Carbon $to) {
        $query->whereTime('start_time', '>=', $from);
        $query->whereTime('end_time', '<', $to);
    }*/

    public function getTimeSlots($start, $end, $interval = '+15 minutes')
    {
        $start_str = strtotime($start);
        $end_str = strtotime($end);
        $now_str = $start_str;
        $midTime = strtotime('12:00:00');

        $data = [];
        $preTime = '';
        $index = '';

        while ($now_str <= $end_str) {
            if ($now_str <= $midTime)
                $index = 'AM';
            else
                $index = 'PM';
            if ($preTime) {
                $data[$index][] = $preTime . '-' . date('H:i:s', $now_str);
            }
            $preTime = date('H:i:s', $now_str);
            $now_str = strtotime($interval, $now_str);
        }

        return $data;
    }

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
