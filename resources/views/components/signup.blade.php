<div class="signup-div" id="signupdiv">
    <span class="material-icons-round close" onclick="hideElement('signupdiv')">
    close
    </span>
    <form action="/signup_session" method="post">
        @csrf
        @method("POST")
        <span class="slogan-small">Join WebPerly</span> <br>
        <span>Join to start promoting your products to thousands of web perlies</span>
        <hr>
        <p>
            <input type="text" name="fullname" placeholder="Full name">
        </p>
        <p>
            <input type="text" name="contact" placeholder="Phone number or email address">
        </p>
        </script>
        <p>
            <input type="password" name="password" placeholder="Password">
        </p>
        <p>
            <input type="password" placeholder="Confirm password">
        </p>
        <p>
            <div class="display-flex-space-between">
                <span class="kanit-small cursor-pointer" onclick="showElement('signindiv', 'block', false)">Sign in instead</span>
                <button>Join</button>
            </div>
        </p>
        <hr>
        <p>
            <button class="w-100">
                <img src="https://img.icons8.com/fluency/50/000000/google-logo.png"/>
                <span>Join with Google</span>
            </button>
        </p>
        <p>
            <button class="w-100">
                <img src="https://img.icons8.com/fluency/50/000000/facebook-new.png"/>
                <span>Join with Facebook</span>
            </button>
        </p>
    </form>
</div>


<div class="picture-div" id="picturediv">
    <span class="slogan-small">Picture</span> 
    <p>
        <div class="display-flex-center">
            <div class="account-picture-empty-signup account-picture-empty-background-{{ $colors[rand(0, sizeof($colors) - 1)] }}">
                <span class="kanit-mid">{{ substr(explode(" ", Session::get("fullname"))[0], 0, 1) }}</span>
            </div>
        </div>
    </p>
    <form id="pictureform" class="display-none" action="/signup_picture" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <input type="file" id="file" name="file">
    </form>
    <form id="signupskippicture" class="display-none" action="/signup_skip_picture" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
    </form>
    <p>
        <div class="display-flex-center mid-gap">
            <span class="kanit-small" onclick="uploadFile('file', 'pictureform')">Upload from this device</span>
            <span class="kanit-small" onclick="submitForm('signupskippicture')">Skip</span>
        </div>
    </p>
    <p>
        <form id="signuppictureurl" action="/signup_picture_url" method="POST">
            @csrf
            @method("POST")
            <span>Or upload from URL</span>
            <div class="input-box">
                <input type="url" name="url" placeholder="URL">
                <button type="button" onclick="submitForm('signuppictureurl')">Upload</button>
            </div>
        </form>
    </p>
</div>