<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RolePeminjam as role;
class Peminjam extends Model
{
    //

    protected $fillable = [
        'rolepeminjam_id', 
        'namapeminjam', 
        'nrp_nip', 
        'nohp_peminjam',
    ];

    public function Role(){
    	return $this->hasOne('role');
    }
}
