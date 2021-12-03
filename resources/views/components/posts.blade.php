<hr>
<p>
    <span class="slogan-small">See what people are selling</span>
</p>
<br>
<div class="posts"> 
    @foreach ($posts::all() as $post)
        <div class="post" onclick="showElement('productdiv{{ $post->id }}', 'flex', false)">
            <div class="display-none">
            {{ $postUser = $users::find($post->user_id) }}
            </div>
            <p>
                <div class="user-post">
                    <div>
                        @if($postUser->picture_path != "")
                            <div class="account-picture">
                                <img src="{{ $postUser->picture_path }}" alt="">
                            </div>
                        @else
                            <div class="account-picture-empty account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                                <span class="kanit-mid">{{ substr(explode(" ", $postUser->full_name)[0], 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <span class="kanit-mid">{{ $postUser->full_name }}</span><br>
                        <span class="kanit-small">{{ $postUser->contact }}</span><br>
                    </div>
                </div>
            </p>
            <img src="{{ $post->post_picture }}" alt="">
            <p>
                <div>
                    <span class="kanit-mid">{{ $post->title }}</span>
                </div>
                <div>
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
                </div>
            </p>
        </div>
    @endforeach
</div>