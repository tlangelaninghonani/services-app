<div class="split-left-item" onclick="showElement('postdiv', 'flex', true)">
    <span class="material-icons-round post-icon">
    add
    </span><br>
    <span>Sell</span>
</div>
<p>
    <div class="split-left-item">
        <span class="material-icons-round">
        more_horiz
        </span><br>
        <span>Categor...</span>
    </div>
</p>
<p>
    <div class="split-left-item">
        <span class="material-icons-round">
        local_offer
        </span><br>
        <span>Promos</span>                  
    </div>
</p>
<p>
    <div class="split-left-item">
        <span class="material-icons-round">
        notifications
        </span><br>
        <span>Notificat...</span>                  
    </div>
</p>
<p>
    <div class="split-left-item" onclick="showElement('chatdiv', 'flex', true)">
        <span class="material-icons-round">
        question_answer
        </span><br>                  
        <span>Chats</span>                
    </div>
</p>
<p>
    <div class="split-left-item">
        <span class="material-icons-round">
        watch_later
        </span><br>                   
        <span>Activities</span>                    
    </div>
</p>
@if(Session::has("userid"))
    <p>
        <div class="split-left-item">
            <span class="material-icons-round">
            account_circle
            </span><br>                   
            <span>Account</span>                 
        </div>
    </p>
    <p>
        <div class="split-left-item" onclick="redirect('/signout')">
            <span class="material-icons-round">
            arrow_back
            </span><br>                   
            <span>Sign out</span>                 
        </div>
    </p>
@endif