<div class="chat-div" id="chatdiv">
    <span class="material-icons-round close" onclick="hideElement('chatdiv')">
    close
    </span>
    <div class="chat-left">
        <span class="slogan-small">Chats</span> 
        <br><br>
        <div class="search">
            <span class="material-icons-round">
            search
            </span>
            <input type="text" placeholder="Search chats">
        </div>
        <br>
        <div class="display-none">
            {{ $holderId = 0 }}
        </div>
        @foreach ($chats as $chat)
            @if(Session::get("userid") == $chat->sender_id)
                <div class="display-none">
                    {{ $chatUser = $users::find($chat->receiver_id) }}
                    {{ $chatUserSender = $users::find($chat->sender_id) }}
                </div>
            @else
                <div class="display-none">
                    {{ $chatUser = $users::find($chat->sender_id) }}
                    {{ $chatUserSender = $users::find($chat->receiver_id) }}
                </div>
            @endif
            @if($chatUser->id != $holderId)
                <div class="display-none">
                    <?php
                        $webperlies = array();
                    ?>
                    {{ $holderId = $chatUser->id }}
                </div>
            @endif
            @foreach ($webperlies as $webperly)
                @if ($chatUser->id != $webperly)
                    <p>
                        <div class="display-flex-align cursor-pointer" onclick="showChats('chats{{ $chat->id }}')">
                            @if($chatUser->picture_path != "")
                                <div class="account-picture">
                                    <img src="{{ $chatUser->picture_path }}" alt="">
                                </div>
                            @else
                                <div class="account-picture-empty account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                                    <span class="kanit-mid">{{ substr(explode(" ", $chatUser->full_name)[0], 0, 1) }}</span>
                                </div>
                            @endif
                            <div>
                                <span class="title">{{ $chatUser->full_name }}</span><br>
                                <span class="kanit-small">{{ $chatUser->contact }}</span>
                            </div>
                        </div>
                    </p>      
                    <div class="display-none">
                        {{ array_push($webperlies, $chatUser->id) }}
                    </div>
                @endif
            @endforeach
            @if (sizeof($webperlies) == 0)
                <p>
                    <div class="display-flex-align cursor-pointer" onclick="showChats('chats{{ $chat->id }}')">
                        @if($chatUser->picture_path != "")
                            <div class="account-picture">
                                <img src="{{ $chatUser->picture_path }}" alt="">
                            </div>
                        @else
                            <div class="account-picture-empty account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                                <span class="kanit-mid">{{ substr(explode(" ", $chatUser->full_name)[0], 0, 1) }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="title">{{ $chatUser->full_name }}</span><br>
                            <span class="kanit-small">{{ $chatUser->contact }}</span>
                        </div>
                    </div>
                </p>  
                <div class="display-none">
                    {{ array_push($webperlies, $chatUser->id) }}
                </div>
            @endif
        @endforeach
    </div>
    <div class="chat-right">
        @foreach ($chats as $chat)
            @if(Session::get("userid") == $chat->sender_id)
                <div class="display-none">
                    {{ $chatUser = $users::find($chat->receiver_id) }}
                    {{ $chatUserSender = $users::find($chat->sender_id) }}
                </div>
                <div id="chats{{ $chat->id }}" class="chats">
                    <div class="display-flex-align">
                        @if($chatUser->picture_path != "")
                            <div class="account-picture">
                                <img src="{{ $chatUser->picture_path }}" alt="">
                            </div>
                        @else
                            <div class="account-picture-empty account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                                <span class="kanit-mid">{{ substr(explode(" ", $chatUser->full_name)[0], 0, 1) }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="title">{{ $chatUser->full_name }}</span><br>
                            <span class="kanit-small">{{ $chatUser->contact }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="messages">
                        <p>
                            @foreach ($messages::where("sender_id", $chatUserSender->id)->orwhere("receiver_id", $chatUserSender->id)->get() as $message)
                                @if($message->receiver_id == $chatUser->id)
                                    @if($message->sender_id == $chatUserSender->id)
                                        <div class="sender-div">
                                            <div class="sender">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="receiver-div">
                                            <div class="receiver">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if($message->sender_id == $chatUser->id)
                                    @if($message->sender_id == $chatUserSender->id)
                                        <div class="sender-div">
                                            <div class="sender">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="receiver-div">
                                            <div class="receiver">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="send-message-div">
                        <form action="/message/send/{{ $chatUser->id }}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="send-message">
                                <input type="text" name="chat" placeholder="Type a message">
                                <button class="button-custom">
                                    <span class="material-icons-round">
                                    send
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="display-none">
                    {{ $chatUser = $users::find($chat->sender_id) }}
                    {{ $chatUserSender = $users::find($chat->receiver_id) }}
                </div>
                <div id="chats{{ $chat->id }}" class="chats">
                    <div class="display-flex-align">
                        @if($chatUser->picture_path != "")
                            <div class="account-picture">
                                <img src="{{ $chatUser->picture_path }}" alt="">
                            </div>
                        @else
                            <div class="account-picture-empty account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                                <span class="kanit-mid">{{ substr(explode(" ", $chatUser->full_name)[0], 0, 1) }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="title">{{ $chatUser->full_name }}</span><br>
                            <span class="kanit-small">{{ $chatUser->contact }}</span>
                        </div>
                    </div>
                    <div class="messages">
                        <p>
                            @foreach ($messages::where("sender_id", $chatUserSender->id)->orwhere("receiver_id", $chatUserSender->id)->get() as $message)
                                @if($message->sender_id == $chatUser->id)
                                    @if($message->sender_id == $chatUserSender->id)
                                        <div class="sender-div">
                                            <div class="sender">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="receiver-div">
                                            <div class="receiver">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if($message->receiver_id == $chatUser->id)
                                    @if($message->sender_id == $chatUserSender->id)
                                        <div class="sender-div">
                                            <div class="sender">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="receiver-div">
                                            <div class="receiver">
                                                <span>{{ $message->chat }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="send-message-div">
                        <form action="/message/send/{{ $chatUser->id }}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="send-message">
                                <input type="text" name="chat" placeholder="Type a message">
                                <button class="button-custom">
                                    <span class="material-icons-round">
                                    send
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
        <div id="privacytip" class="display-flex-center h-100">
            <div class="text-align-center">
                <span class="material-icons-round icon-mid">
                shield
                </span>
                <p>
                    <span class="kanit-small">WebPerly is not authorized to <br> read or view your chats</span>
                </p>
            </div>
        </div>
    </div>
    <script>
        function showChats(id){
            for (let i = 0; i < document.querySelectorAll(".chats").length; i++) {
                document.querySelectorAll(".chats")[i].style.display = "none";
            } 
            document.querySelector("#"+id).style.display = "block";
            document.querySelector("#privacytip").style.display = "none";
        }
    </script>
</div>