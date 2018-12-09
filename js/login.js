// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');
var password = document.getElementById("password")
var confirm_password = document.getElementById("confirmPassword");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


$('#login_user').click(function(){
  document.getElementById('id01').style.display='block';
});

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
