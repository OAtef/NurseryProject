// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

$( "#loginBtn" ).click(function() {
  document.getElementById('id01').style.display='block';
});

$( "#signupBtn" ).click(function() {
  document.getElementById('id02').style.display='block';
});

$("#closebtn1").click(function(){
  document.getElementById('id01').style.display='none';
});

$("#closebtn2").click(function(){
  document.getElementById('id02').style.display='none';
});
