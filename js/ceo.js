$(document).ready(function() {

  document.getElementById("EditorDiv").style.visibility = 'hidden';

  $("#vm").click(function() {

    $(".HideAll").hide();
    $("#Vmsg").show();

    $.ajax({
      url: "viewMsg.php",
      type: "POST",
      success: function(msgData) {
        $("#Vmsg").html(msgData);
      },
    })
  });

  $("#sm").click(function() {
    $(".HideAll").hide();
    $("#Smsg").show();
  });

  $("#AE").click(function() {
    $(".HideAll").hide();
    $("#AddEmployee").show();
  });

  $("#VE").click(function() {
    $(".HideAll").hide();
    $("#ViewEmployee").show();
  });

  $("#addEmpbtn").click(function(event) {
    event.preventDefault();

    $.ajax({
      url: "insertEmployee.php",
      data: $('#EmployeeForm').serialize(), // takes all data in the form in a string
      type: "POST",
      success: function(data) {
        console.log(data);
      },
    });
  });



  // var readURL = function(input) {
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();
  //     reader.onload = function(e) {
  //       $('.avatar').attr('src', e.target.result);
  //     }
  //     reader.readAsDataURL(input.files[0]);
  //   }
  // }

  // $(".file-upload").on('change', function() {
  //   readURL(this);
  // });

});

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "150px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function EditEmployee() {


}

function AddEmployee() {


}
