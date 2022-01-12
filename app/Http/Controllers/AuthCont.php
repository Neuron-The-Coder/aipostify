<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthCont extends Controller
{
    // Register
    public function register(Request $req){
        // name, company, email, phone, password, confirm
        // name dan company
        $valid = Validator::make($req->all(), [
            'name' => ['required', 'min:5', 'unique:users,name'],
            'company' => ['required', 'min:8', 'unique:users,company'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^0[0-9]{10,12}$/'],
            'password' => ['required', 'min:8', 'alpha_num'],
            'confirm' => ['required', 'same:password']
        ],[
            'phone.regex' => 'Must be 11-13 numbers, no space, and starts with 0 (eg. 081234567890)',
            'confirm.same' => 'The Password and Confirm Password fields MUST be the same value',
            'company.unique' => 'This company already exists'
        ]);

        if ($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput($req->all());
        }
        else {
            // Insert new user
            User::insert([
                'name' => $req->name,
                'company' => $req->company,
                'phone' => $req->phone,
                'email' => $req->email,
                'password' => bcrypt($req->password)
            ]);
            return redirect()->back()->with('success', 'Success. Please head to the login menu')->withInput($req->all());
        };

    }

    public function login(Request $req){

        $remember = (isset($req->remember)) ? true : false;

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password], $remember)){
            $req->session()->regenerate();
            return redirect()->intended('/');
        }

        else return redirect()->back()->withErrors([
            'message' => 'Email not found or Password incorrect'
        ]);
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('index');
    }
}
