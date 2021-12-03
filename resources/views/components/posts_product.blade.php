@foreach ($posts::all() as $post)
    <div class="display-none">
    {{ $postUser = $users::find($post->user_id) }}
    </div>
    <div class="product-div" id="productdiv{{ $post->id }}">
        <span class="material-icons-round close white" onclick="hideElement('productdiv{{ $post->id }}')">
        close
        </span>
        <div class="product-right">
            <div class="display-flex-align">
                @if($postUser->picture_path != "")
                    <div class="account-picture">
                        <img src="{{ $postUser->picture_path }}" alt="">
                    </div>
                @else
                    <div class="account-picture-empty account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                        <span class="kanit-mid">{{ substr(explode(" ", $postUser->full_name)[0], 0, 1) }}</span>
                    </div>
                @endif
                <div>
                    <span class="title">{{ $postUser->full_name }}</span><br>
                    <span class="kanit-small">Car dealer</span>
                </div>
            </div>
            <p>
                <div>
                    <span class="kanit-mid">{{ $post->title }}</span>
                </div>
                <div>
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        place
                        </span>
                        <div class="display-none">
                            {{ $timePosted = (intval(date("d")) - intval($post->date_and_time)) }}
                            @if($timePosted == 0)
                                {{ $timePosted = (1)."d" }}
                            @endif
                        </div>
                        <span class="kanit-small">{{ $timePosted }} &#183; {{ $post->location }}</span>
                    </div> 
                    <span class="kanit-small">ZAR {{ number_format($post->price, 2) }}</span>
                </div>
            </p>
            @if($post->description_text != "")
                <hr>
                <p>
                    <span class="kanit-mid">Description</span>
                </p>
                <p>
                    <span>{{ $post->description_text }}</span>
                </p>
            @endif
            @if($post->description_keyvalue != "")
                <hr>
                <p>
                    <span class="kanit-mid">Properties</span>
                </p>
                <p>
                    <div class="display-none">
                        {{ $counter = 0 }}
                    </div>
                    <div class="properties-post">
                    @foreach (json_decode($post->description_keyvalue, true) as $keyvalue)
                        <div class="{{ $propertiesClasses[$counter] }}">
                            <span>{{ $keyvalue[0] }}</span>
                            <span class="kanit-small">{{ $keyvalue[1] }}</span>
                        </div>                       
                        @if($counter == 2)
                            <div class="display-none">
                                {{ $counter = 0 }}
                            </div>
                        @else
                            <div class="display-none">
                                {{ $counter++ }}
                            </div>
                        @endif
                    @endforeach
                    </div>
                </p>
            @endif
            <hr>
            <p>
                <span class="kanit-mid">Contacts</span>
            </p>
            <p>
                <ul>
                    <li>{{ $postUser->contact }}</li>
                </ul>
            </p>
            @if(Session::has("userid"))
                @if(Session::get("userid") != $postUser->id)
                    <p>
                        <form action="/message/send/{{ $postUser->id }}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="send-message">
                                <input type="text" name="chat" placeholder="Type a message" value="I'm interested in this, still available?">
                                <button class="button-custom">
                                    <span class="material-icons-round">
                                    send
                                    </span>
                                </button>
                            </div>
                        </form>
                    </p>
                @endif
            @else
                <p>
                    <div class="display-flex-space-between">
                        <button class="w-100" onclick="showElement('signindiv', 'block', false)">Sign in to chat with {{ $postUser->full_name }}</button>
                    </div>
                </p>
            @endif
        </div>
        <div class="product-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.583174323106!2d29.45233131446608!3d-23.90439508023328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ec6d82f0e328253%3A0x5829d7b37b2dbf7e!2sCTU%20Training%20Solutions%20Polokwane!5e0!3m2!1sen!2sza!4v1638396747860!5m2!1sen!2sza" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="product-left">
            <img src="{{ $post->post_picture }}" alt="">
            <div class="pager">
                <span class="material-icons-round page-back">
                arrow_back
                </span>
                <span class="material-icons-round page-next">
                arrow_forward
                </span>
            </div>
        </div>
    </div>
@endforeach