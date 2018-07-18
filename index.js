function doSomething(value){
      console.log(value);
      var x = document.getElementById("coding").value;
      console.log(x);
}
function createTable(){
    console.log("hii");
    document.getElementById("TheBody").innerHTML = "Hello";
}
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
