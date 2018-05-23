<?php

namespace App\Http\Controllers;
use App\User;
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
      		'name' => 'required|string|max:255',
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
}
