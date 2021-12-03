var googleIcons = document.createElement("link");
googleIcons.rel = "stylesheet";
googleIcons.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Outlined";

var googleIconsRound = document.createElement("link");
googleIconsRound.rel = "stylesheet";
googleIconsRound.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Round";

var googleIconsSharp = document.createElement("link");
googleIconsSharp.rel = "stylesheet";
googleIconsSharp.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Sharp";


var jQuery = document.createElement("script");
jQuery.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";

document.getElementsByTagName("head")[0].appendChild(googleIcons);
document.getElementsByTagName("head")[0].appendChild(googleIconsRound);
document.getElementsByTagName("head")[0].appendChild(googleIconsSharp);
document.getElementsByTagName("head")[0].appendChild(jQuery);

function redirect(path){
    window.location.href = path;
}

function redirectBack(){
   history.back();
}

function addFilter(){
    document.querySelector(".header").classList.add("filter");
    document.querySelector(".split").classList.add("filter");

    document.querySelector(".header").style.pointerEvents = 'none';
    document.querySelector(".split").style.pointerEvents = 'none';
}

function removeFilter(){
    document.querySelector(".header").classList.remove("filter");
    document.querySelector(".split").classList.remove("filter");

    document.querySelector(".header").style.pointerEvents = 'auto';
    document.querySelector(".split").style.pointerEvents = 'auto';
}

function hideElement(id){
    document.querySelector("#"+id).style.display = "none";
    removeFilter();
}

function showElement(id, display, auth){
    document.querySelector("#signupdiv").style.display = "none";
    document.querySelector("#signindiv").style.display = "none";
    document.querySelector("#chatdiv").style.display = "none";
    document.querySelector("#postdiv").style.display = "none";

    for (let i = 0; i < document.querySelectorAll(".product-div").length; i++) {
        document.querySelectorAll(".product-div")[i].style.display = "none";
        
    }

    addFilter();
    if(auth == true){
        if(sessionStorage.getItem("userid") == null){
            document.querySelector("#signindiv").style.display = "block";
            return   
        }
    }

    document.querySelector("#"+id).style.display = display;

}

function showHideElement(showId, hideId, display){
    document.querySelector("#"+showId).style.display = display;
    document.querySelector("#"+hideId).style.display = "none";
}

function uploadFile(id, formId){
    let file = document.querySelector("#"+id);
    file.click();
    file.onchange = function(){
        document.querySelector("#"+formId).submit();
    }
}

function submitForm(id){
    document.querySelector("#"+id).submit();
}

function redirect(path){
    window.location.href = path;
}


var perliesScrollTo = 600;
var perliesScrollFro = false;
function perliesScrollForward(){
    if(perliesScrollFro == true){
        perliesScrollTo = 600;
        perliesScrollFro = false;
    }
    document.querySelector(".perlies").scrollTo({
        left: perliesScrollTo,
        behavior: 'smooth'
    });
    perliesScrollTo += 600;
    
}

function perliesScrollBack(){
    if(perliesScrollFro == false){
        perliesScrollTo = 600;
        perliesScrollFro = true;
    }
    document.querySelector(".perlies").scrollTo({
        left: perliesScrollTo,
        behavior: 'smooth'
    });
    perliesScrollTo -= 600;
    
}


