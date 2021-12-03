<form action="/post" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    <div class="post-div" id="postdiv">
        <span class="material-icons-round close post-close" onclick="hideElement('postdiv')">
        close
        </span>
        <div class="post-left">
            <span class="slogan-small">Create your post</span> 
            <br><br>
            <input type="file" name="file" id="postpicture">
            <p>
                <select name="category" class="category-select">
                    <option value="">Select a category related to your post</option>
                    @foreach ($categories::all() as $category)
                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <input type="text" name="title" placeholder="Title">
            </p>
            <p>
                <div class="input-box">
                    <input type="text" name="location" placeholder="Location">
                    <button type="button" class="button-black">
                        <div class="display-flex-align">
                            <span class="material-icons-round">
                            place
                            </span>
                            <span>Or detect</span>
                        </div>
                    </button>
                </div>
            </p>
            <p>
                <input type="number" name="price" placeholder="Price">
            </p>
            <p>
                <button>Post</button>
            </p>
        </div>
        <div class="post-center">
            <input type="hidden" id="descriptionkeyvalue" name="descriptionkeyvalue">
            <span class="slogan-small" style="color: white">Create your post</span> 
            <br><br>
            <div class="descriptions">
                <p>
                    <textarea name="descriptiontext" cols="30" rows="3" placeholder="Description"></textarea>
                </p>
                <div id="properties" class="properties">

                </div>
                <div id="addproperties">
                    <p>
                        <div class="input-box">
                            <input type="text" id="key" name="key" placeholder="Property name">
                            <input type="text" id="value" name="value" placeholder="Property value">
                            <button type="button" class="button-custom" onclick="properties()">
                               <div class="display-flex-center">
                                    <span class="material-icons-round">
                                    add
                                    </span>
                                    <span>Add</span>
                               </div>
                            </button>
                        </div> 
                    </p>
                </div>
            </div>
        </div>
        <div class="post-right">
            <div class="text-align-center w-100" style="position: relative">
                <div id="initpictureupload" class="display-flex-center " style="height: 100%" onclick="uploadpostpicture()">
                    <div class="text-align-center">
                        <span class="material-icons-round icon-mid">
                        image
                        </span>
                        <p>
                            <span class="kanit-small">Click to upload a picture</span>
                        </p>
                    </div>
                </div>
                <img id="uploadedpicturepreview" style="filter: brightness(40%);" class="display-none" src="http://cdn.mos.cms.futurecdn.net/6t8Zh249QiFmVnkQdCCtHK.jpg" alt="">
            </div>
        </div>
        <script>
            function uploadpostpicture(){
                document.querySelector("#postpicture").click();
                document.querySelector("#postpicture").onchange = function(event){
                    document.querySelector("#initpictureupload").classList.add("white");
                    document.querySelector(".post-close").classList.add("white");
                    document.querySelector("#uploadedpicturepreview").src = URL.createObjectURL(event.target.files[0]);
                    document.querySelector("#uploadedpicturepreview").style.display = "block";
                };
            }
            var propertyAddCount = 0;
            var numProperties = 0;
            let propertiesArr = [];
            function properties(){
                let refinedPropertiesArr = [];
                let propertyClasses = ["property", "property-center", "property-end"];
                let key = document.querySelector("#key");
                let value = document.querySelector("#value");

                let properties = document.querySelector("#properties");
                let property = document.createElement("div");
                let container = document.createElement("div");
                let propertyKey = document.createElement("span");
                let propertyValue = document.createElement("span");
                let deleteIcon = document.createElement("span");

                propertyKey.innerHTML = key.value;
                propertyValue.innerHTML = value.value;

                propertiesArr[numProperties] = [key.value, value.value];

                propertyValue.setAttribute("class", "kanit-small");
                deleteIcon.setAttribute("class", "material-icons-round");
                deleteIcon.onclick = function(){
                    let refinedPropertiesArr = [];
                    numProperties--;
                    propertyAddCount--;
                    if(propertyAddCount == -1){
                        propertyAddCount = 2;
                    }
                    propertiesArr[deleteIcon.parentElement.id] = [];
                    deleteIcon.parentElement.remove();
                    document.querySelector("#addproperties").style.display = "block";
                    for (let i = 0; i < propertiesArr.length; i++) {
                        if(propertiesArr[i].length > 0){
                            refinedPropertiesArr[i] = propertiesArr[i];
                        }
                    }
                    if(refinedPropertiesArr.length > 0){
                        properties.style.display = "grid";
                    }else{
                        properties.style.display = "none";
                    }
                }
                deleteIcon.className  += " cursor-pointer";
                deleteIcon.innerHTML = "delete";

                property.setAttribute("class", propertyClasses[propertyAddCount]);
                property.className  += " mid-icon";
                property.setAttribute("id", numProperties);
                container.setAttribute("class", "display-flex-align");

                container.appendChild(propertyKey);
                container.appendChild(propertyValue);

                property.appendChild(container);
                property.appendChild(deleteIcon);

                properties.appendChild(property);
                if(propertyAddCount == 2){
                    propertyAddCount = 0;
                }else{
                    propertyAddCount++;
                }

                numProperties++;
                if(numProperties == 9){
                    document.querySelector("#addproperties").style.display = "none";
                    return
                }
                for (let i = 0; i < propertiesArr.length; i++) {
                    if(propertiesArr[i].length > 0){
                        refinedPropertiesArr[i] = propertiesArr[i];
                        document.querySelector("#descriptionkeyvalue").value = JSON.stringify(refinedPropertiesArr);
                    }
                }
                if(refinedPropertiesArr.length > 0){
                    properties.style.display = "grid";
                }else{
                    properties.style.display = "none";
                }
            }
        </script>
    </div>
</form>