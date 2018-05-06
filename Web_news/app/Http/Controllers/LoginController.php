<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin(){
    	if (!Auth::check()) {
		    return view('admin.modules.login.form_login');
		} else {
			return redirect()->route('admin');
		}
    	
    }

	public function postLogin(LoginRequest $request){
		$login = [
			'username' => $request->txtUser, 
			'password' => $request->txtPass, 
			'level' => 1
		];
	    if (Auth::attempt($login)) {
	    	// The user is active, not suspended, and exists.
	    	return redirect()->route('admin');
	    } else {
	    	return redirect()->back();
	    }
	}

	public function getLogout(){
		Auth::logout();
		return redirect()->route('getLogin');
	}

}
