<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['desktopCss'] }}">
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="{{ $links['desktopJs'] }}"></script>
    <title>WebPerly</title>
</head>
<body>
    <!--<div class="open-messages">
        <span class="kanit-small">Messages</span>
        <span class="material-icons-round" onclick="showElement('chatdiv', 'flex', true)">
        expand_less
        </span>
    </div>-->
    @include('components.signin')
    @include('components.product')
    @include('components.signup')
    @include('components.chat')
    @include('components.post')
    @include('components.top_nav')
    @include('components.posts_product')
    <div class="container">
        <div class="split">
            
                <div class="split-left">
                    <div>
                    @include('components.side_nav')
                    </div>
                </div>
           
            <div class="split-right">
                @if(! Session::has("userid"))
                    <div class="text-align-center">
                        <span class="slogan">Got something to sell or buy? Start with WebPerly</span>
                    </div>
                    <br>
                    <p>
                        <div class="display-flex-center small-gap">
                            <div class="search">
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
                            <div class="display-flex-align" style="gap: 20px">
                                <div>
                                    <span class="no-wrap">Todays' pick</span><br>
                                    <span class="kanit-mid">Used cars</span>
                                </div>
                                <span class="material-icons-round">
                                open_in_new
                                </span>
                            </div>
                        </div>
                        <br>
                        <hr>
                    @endif
                    @if(Session::has("userid"))
                        <span class="kanit-mid">Did you know?</span><br>
                        <span>Not necessarly products you have to promote with <span class="kanit-small">WebPerly</span>, you can also promote services such as plumbing, therapy, cleaning and more ...</span>
                    @endif
                    <p>
                        <div >
                            <span class="slogan-small">Sales on promotion</span><br>
                            <div class="display-flex-align">
                                <span class="kanit-mid">View all</span>
                                <span class="material-icons-round">
                                open_in_new
                                </span>
                            </div>
                        </div>
                    </p>
                    <p>
                        @include('components.promotions')
                    </p>
                    <hr>
                    <p>
                        <div>
                            <span class="slogan-small">Top rated web perlies in <span class="kanit-big">services category</span></span><br>
                            <div class="display-flex-align">
                                <span class="kanit-mid">View all</span>
                                <span class="material-icons-round">
                                open_in_new
                                </span>
                            </div>
                        </div>
                    </p>
                    <p>
                        @include('components.top_rated_perlies')
                        <div>
                            <span class="kanit-small">Want to appear on this list?</span><br>
                            <div class="display-flex-align">
                                <span class="material-icons-round">
                                lightbulb
                                </span>
                                <span>Advertise your products </span>&#183;
                                <span>Respond fast to queries about your products </span>&#183;
                                <span>List prices for your products</span>
                            </div>
                        </div>
                    </p>
                    <hr>
                    <p>
                        <div>
                            <span class="slogan-small">Some categories you may be interested in</span>
                            <div class="display-flex-align">
                                <span class="kanit-mid">View all</span>
                                <span class="material-icons-round">
                                open_in_new
                                </span>
                            </div>
                        </div>
                    </p>
                    @include('components.categories')
                </p>
                @if($posts::all()->count() > 0)
                    @include('components.posts')
                @endif
                <hr>
                <p>
                    <div class="ad">
                        <div class="display-flex-space-between">
                            <div>
                                <span class="ad-text">WebPerly Gold</span>
                                <p>
                                    <div style="max-width: 80%">
                                        <span>With WebPerly Gold, you can <span class="kanit-small">advertise</span> your products to reach thousands of other perlies, making your <span class="kanit-small">products well know in our network</span></span>
                                    </div>
                                </p>
                                <br>
                                <p>
                                    <button class="button-custom" style="padding-left: 30px; padding-right: 30px">
                                        <span>Get started now</span>
                                        <span class="material-icons-round">
                                        arrow_forward
                                        </span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
    @if(Session::has("signuppicture"))
        <script>
            document.querySelector("#picturediv").style.display = "block";
        </script>
    @endif
    @if(Session::has("userid"))
        <script>
            sessionStorage.setItem("userid", "true");
        </script>
    @else
        <script>
            sessionStorage.removeItem("userid");
        </script>
    @endif
</body>
</html>