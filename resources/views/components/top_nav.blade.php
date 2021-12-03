<div class="header">
    <div class="display-flex-align " style="margin-top: -5px; margin-right: 30px">
        <span class="app-name" onclick="redirect('/')">WebPerly</span>
    </div>
    @if(Session::has("userid"))
        <div class="search w-100">
            <span class="material-icons-round">
            search
            </span>
            <input type="text" placeholder="Looking for something specific?">
            <div class="display-flex-align">
                <span class="kanit-small">Categories</span>
                <span class="material-icons-round">
                expand_more
                </span>
            </div>
        </div>
        <div class="display-flex-align mid-gap w-100 display-flex-end">
            <div class="display-flex-align cursor-pointer">
                <span class="material-icons-round">
                verified
                </span>
                <span>Verified perlies</span>
            </div>
            <span>WebPerly for business</span>
            <span>Explore</span>
            <span>Help</span>
            @if($user->picture_path != "")
                <div class="account-picture">
                    <img src="{{ $user->picture_path }}" alt="">
                </div>
            @else
                <div class="account-picture-empty account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                    <span class="kanit-mid">{{ substr(explode(" ", $user->full_name)[0], 0, 1) }}</span>
                </div>
            @endif
        </div>
    @else
        <div class="display-flex-align mid-gap w-100 display-flex-end cursor-pointer">
            <div class="display-flex-align">
                <span class="material-icons-round">
                verified
                </span>
                <span>Verified perlies</span>
            </div>
            <span>WebPerly for business</span>
            <span>Explore</span>
            <span>Help</span>
            <span class="kanit-small" onclick="showElement('signindiv', 'block', false)">sign in</span>
            <button onclick="showElement('signupdiv', 'block', false)">Join WebPerly</button>
        </div>
    @endif
</div>