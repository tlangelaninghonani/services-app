<div class="signin-div" id="signindiv">
    <span class="material-icons-round close" onclick="hideElement('signindiv')">
    close
    </span>
    <form action="/signin" method="POST">
        @csrf
        @method("POST")
        <span class="slogan-small">Sign in</span> 
        <p>
            <input type="text" name="fullnameorcontact" placeholder="Full name or contact">
        </p>
        <p>
            <input type="password" name="password" placeholder="Password">
        </p>
        <p>
            <div class="display-flex-space-between">
                <span class="kanit-small cursor-pointer" onclick="showElement('signupdiv', 'block', false)">Create an account</span>
                <button>Sign in</button>
            </div>
        </p>
        <hr>
        <p>
            <button class="w-100">
                <img src="https://img.icons8.com/fluency/50/000000/google-logo.png"/>
                <span>Sign in with Google</span>
            </button>
        </p>
        <p>
            <button class="w-100">
                <img src="https://img.icons8.com/fluency/50/000000/facebook-new.png"/>
                <span>Sign in with Facebook</span>
            </button>
        </p>
    </form>
</div>