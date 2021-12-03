<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function chat(Request $req, $id){
        $user = User::find(Session::get("userid"));
        $chat = new Chat();
        $chat->sender_id = $user->id;
        $chat->receiver_id = $id;
        $chat->chat = $req->chat;
        $chat->date_and_time = date('H:i A d-M-Y');
        $chat->save();

        return back();
    }
}
