$(document).on("click",".row", function(){
  extraRowClass = ".extra-data-" + $(this).prop("class").split(" ")[1];
  $(extraRowClass).slideToggle(50);
});

// to change the labels in the tables

function changeName() {

  let lbl = document.getElementById('lblName');
  let empName = document.getElementById('emp').value;

  lbl.innerText = empName; // TREATS EVERY CONTENT AS TEXT.
}

function changeMobile() {

  let lbl = document.getElementById('lblMobile');
  let empName = document.getElementById('emp').value;

  lbl.innerText = empName; // TREATS EVERY CONTENT AS TEXT.
}

function changeEmail() {

  let lbl = document.getElementById('lblEmail');
  let empName = document.getElementById('emp').value;

  lbl.innerText = empName; // TREATS EVERY CONTENT AS TEXT.
}
