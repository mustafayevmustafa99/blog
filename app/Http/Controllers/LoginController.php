<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class LoginController extends Controller
{
    public function getLogin(){
        return view("back.auth.login");
    }
    public function postLogin(Request $request){
        if ($request->isMethod('post')) {

            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {


                return redirect()->route("dashboard");

            }else{

                return redirect()->route("getLogin")->with('message','Istifadeci adi ve ya sifre yalnisdir!!!');
            }
        }
    }
    public function getRegister(Request $request){
        return view("back.auth.register");
    }
    public function postRegister(Request $request){
        $rules=[
            'name'=>'required',
            'email'=>'required|email|unique:users',
        ];

        $validate= Validator::make($request->post(),$rules);
        if ($validate->fails()){
            return redirect()->route('getRegister')->withErrors($validate)->withInput();
        }
        DB::table('users')->insert(
            ['name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'password'=>Hash::make($request->get('password'))
            ]
        );

        return redirect()->route("getRegister")->with('message','Istifadeci kayedildi');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route("getLogin");
    }
}
