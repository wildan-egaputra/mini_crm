<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Hash;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    function login(){
        // dd(FacadesHash::make(111111));
        if(!empty(FacadesAuth::check())){
            return redirect('panel.dashboard');
        }
        return view('auth.login');
        
    }
    public function auth_login(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if(FacadesAuth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            return redirect('panel/dashboard');
        }
        else
        {
            return redirect()->back()->with('error', "Tuliskan Email dan password dengan benar");
        }
    }
    public function logout(){
        FacadesAuth::logout();
        return redirect(url(''));
    }
}
