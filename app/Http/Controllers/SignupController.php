<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignupController extends Controller
{
    public function signupSession(Request $req){
        Session::put("fullname", ucfirst(strtolower($req->fullname)));
        Session::put("contact", $req->contact);
        Session::put("password", Hash::make($req->password));
        Session::put("signuppicture", true);
        return back();
        
    }

    public function signupPicture(Request $req){
        $file = $req->file("file");
        $uniqueFileName = time()."_".$file->getClientOriginalName();
        $file->move("storage/user/picture", $uniqueFileName);

        $user = new User();
        $user->full_name = Session::get("fullname");
        $user->contact = Session::get("contact");
        $user->password = Session::get("password");
        $user->picture_path = "/storage/user/picture/".$uniqueFileName;
        $user->save();

        Session::flush();
        Session::put("userid", $user->id);
        return back();
    }

    public function signupSkipPicture(){
        $user = new User();
        $user->full_name = Session::get("fullname");
        $user->contact = Session::get("contact");
        $user->password = Session::get("password");
        $user->save();

        Session::flush();
        Session::put("userid", $user->id);
        return back();
    }

    public function signupPictureURL(Request $req){
        $user = new User();
        $user->full_name = Session::get("fullname");
        $user->contact = Session::get("contact");
        $user->password = Session::get("password");
        $user->picture_path = $req->url;
        $user->save();

        Session::flush();
        Session::put("userid", $user->id);
        return back();
    }
}
