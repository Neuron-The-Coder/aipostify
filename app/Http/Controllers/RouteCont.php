<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteCont extends Controller{
    

    public function getIndex(){
        return view('index');
    }

    public function getContactUs(){
        return view('contact-us');
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function getRegister(){
        return view('auth.register');
    }

    public function getIn(){
        return view('input-stock');
    }

    public function getOut(){
        return view('output-stock');
    }

    public function getProfile(){
        
        return view('profile');
    }

}
