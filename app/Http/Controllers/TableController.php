<?php

namespace App\Http\Controllers;
use App\User;
use App\Peminjam;
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

        return redirect('/admin');
    }

    public function storeUser(Request $request)
    {
      	$this->validate($request,[
      		'name' => 'required|string|max:255|regex:[A-Za-z ]',
            'username' => 'required|string|max:20|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
      	]);

            $admin = new User;
            $admin->name     = Input::get('name');
            $admin->username = Input::get('username');
            $admin->password = bcrypt(Input::get('password'));
            $admin->save();

            // redirect
            return redirect('/admin');  	
    }

    public function storePeminjam(Request $request){
        $this->validate($request,[
            'rolepeminjam_id' => 'required|exists:rolepeminjams,id',
            'namapeminjam' => 'required|string|max:255|regex:[\w ]',
            'nrp_nip' => 'required|string|min:10|regex:[\d]',
            'nohp_peminjam' =>'required|string|min:11|regex:[\d]',
        ]);

            $peminjam = new Peminjam;
            $peminjam->rolepeminjam_id = Input::get('rolepeminjam_id');
            $peminjam->namapeminjam     = Input::get('namapeminjam');
            $peminjam->nrp_nip = Input::get('nrp_nip');
            $peminjam->nohp_peminjam = Input::get('nohp_peminjam');
            $peminjam->save();

            // redirect
            return redirect('/bookHere');
    }
    
}
