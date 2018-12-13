window.addEventListener('load', init);
var activeLi = 0;

function init() {
    var str = "Salo, Salo, Cybula, Hlib, Gorilka, Ogirok";
    var list = str.split(", ");
    var inputSearch = document.getElementById("userInput");
    var ulElem = document.createElement("ul");
    for (let i = 0; i < list.length; i++) {
        var liElement = document.createElement("li");
        var cHtml =
            `<img src="images/${list[i]}.jpg" class="img-circle"/>
            <a href="#">${list[i]}</a>`;
        liElement.innerHTML = cHtml;
        ulElem.appendChild(liElement);
        liElement.onclick = clickLiElement;
    }
    var parent = document.getElementById("droplistContent");
    parent.appendChild(ulElem);

    // inputSearch.onclick = function () {
    //     parent.classList.toggle("showElement");
    // }
    inputSearch.onkeyup = function (e) {

        var tagsLi = parent.getElementsByTagName("li");
        var dropdown = document.getElementById("droplistContent");
        if (this.value.length > 1) {
            if (!dropdown.classList.contains("showElement")) {
                dropdown.classList.add("showElement");
            }
            var filter = this.value.toUpperCase();
            for (let i = 0; i < tagsLi.length; i++) {
                if (tagsLi[i].children[1].text.toUpperCase().indexOf(filter) > -1) {
                    tagsLi[i].style.display = "";
                } else {
                    tagsLi[i].style.display = "none";
                }
            }
        }
        else {
            if (dropdown.classList.contains("showElement")) {
                    dropdown.classList.remove("showElement");
            }
        }
        if (e.keyCode==40 && tagsLi.length>activeLi){

            if (activeLi>0){
                tagsLi[activeLi-1].classList.remove("li-hover");
            }

            if (!tagsLi[activeLi].classList.contains("li-hover")) {
                tagsLi[activeLi].classList.add("li-hover");
            }

                activeLi++;
        }
        // if (e.key==38&& activeLi>1){
        //     activeLi--;
        //     if (!tagsLi[activeLi].classList.contains("li-hover")) {
        //         tagsLi[activeLi].classList.add("li-hover");
        //     }
        //     tagsLi[activeLi].classList.
        // }
    }
}

function clickLiElement() {
    //console.log("----li----", this);
    var inputSearch = document.getElementById("userInput");
    var childs = this.children;
    for (let j = 0; j < childs.length; j++) {
        if (childs[j].nodeName == 'A') {
            inputSearch.value = childs[j].text;
            break;
        }
    }
}

window.onclick = function (e) {
    if (!e.target.matches("#userInput")) {
        var dropdown = document.getElementById("droplistContent");
        if (dropdown.classList.contains("showElement")) {
            dropdown.classList.remove("showElement");
        }
    }
}

