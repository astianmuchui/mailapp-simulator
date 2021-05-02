var open = document.getElementById("trigger");
var modal = document.getElementById("modal");
var span = document.getElementById("span");
open.onclick = function open(){
    modal.style.display = "block";
}
span.onclick = function close(){
    modal.style.display = "none";
}