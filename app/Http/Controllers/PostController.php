<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function post(Request $req){

        $user = User::find(Session::get("userid"));
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = ucfirst($req->title);
        $post->description_text = $req->descriptiontext;
        $post->description_keyvalue = $req->descriptionkeyvalue;
        $post->price = $req->price;
        $post->category = $req->category;
        $post->location = $req->location;
        $post->date_and_time = date('d');

        $file = $req->file("file");
        $uniqueFileName = time()."_".$file->getClientOriginalName();
        $file->move("storage/user/posts", $uniqueFileName);

        $post->post_picture = "/storage/user/posts/".$uniqueFileName;

        $post->save();

        return back();
    }
}
