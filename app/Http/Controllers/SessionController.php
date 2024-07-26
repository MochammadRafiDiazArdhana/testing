<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SessionController extends Controller
{
    public function index(){
        return view('sesi/index');
    }
    public function login(Request $request){
        Session::flash('nip', $request->nip);
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ],[
            'nip.required' => "NIP harus diisi",
            'password.required' => "Password Harus diisi",
        ]);

        $infologin = [
            'nip'=>$request->nip,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/')->with('succes', 'Berhasil Login');
        } else {
            return redirect('login')->with('succes', 'Berhasil Login');
        }
    }
}
