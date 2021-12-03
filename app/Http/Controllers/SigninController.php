<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SigninController extends Controller
{
    public function signin(Request $req){
        if(User::where("full_name", $req->fullnameorcontact)->orwhere("contact", $req->fullnameorcontact)->exists()){
            if(User::where("full_name", $req->fullnameorcontact)->exists()){
                $user = User::where("full_name", $req->fullnameorcontact)->first();
            }
            if(User::where("contact", $req->fullnameorcontact)->exists()){
                $user = User::where("contact", $req->fullnameorcontact)->first();
            }
            if(Hash::check($req->password, $user->password)){
                
                Session::flush();
                Session::put("userid", $user->id);

                return redirect("/");
            }
        }
    }
}
