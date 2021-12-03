<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Chat;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $user = User::find(Session::get("userid"));
        $categories = new Category();
        $posts = new Post();
        $users = new User();
        $colors = array("teal", "red", "gray");
        $propertiesClasses = array("property", "property-center", "property-end");
        $webperlies = array();
        if($user){
            $chats = Chat::where("sender_id", $user->id)->orwhere("receiver_id", $user->id)->get();
            $messages = new Chat();
        }else{
            $chats = [];
            $messages = [];
        }
        return view("home", [
            "user" => $user,
            "users" => $users,
            "categories" => $categories,
            "posts" => $posts,
            "colors" => $colors,
            "propertiesClasses" => $propertiesClasses,
            "chats" => $chats,
            "messages" => $messages,
            "webperlies" => $webperlies
        ]);
    }
}
