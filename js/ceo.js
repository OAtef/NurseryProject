var extraRowClass;
var selectedID;
var selectedRow;

$(document).ready(function() {

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

    $.ajax({
      url: "viewEmployee.php",
      type: "POST",
      success: function(employeeData) {
        $("#ViewEmployee").html(employeeData);
      },
    })
  });

  $("#addEmpbtn").click(function(event) {
    event.preventDefault();

    $.ajax({
      url: "insertEmployee.php",
      data: $('#EmployeeForm').serialize(), // takes all data in the form in a string
      type: "POST",
      success: function(data) {
        $("#AddEmployee").html(employeeData);
      },
    });
  });
});

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "150px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

//table

$(document).on("click",".row", function(){
  extraRowClass = ".extra-data-" + $(this).prop("class").split(" ")[1];
  $(extraRowClass).slideToggle(50);
});

$(document).on("mouseenter",".row", function(){
  selectedID = ".lblID-" + $(this).prop("class").split(" ")[1];
  selectedRow = $(this).prop("class").split(" ")[1];
});


// to change the labels in the tables

function DeleteEmployee() {

  swal({
      html: "Enter New Employee ID: <input type='text' id='NewEmployeeID' value=''>",
      confirmButtonText: 'Confirm',
      showCancelButton: true,
      preConfirm: function() {

        $.ajax({
          url: "deleteEmployee.php",
          data: {oldEmployee: $(selectedID).text(), newEmployee: $('#NewEmployeeID').val()},
          type: "POST",
          success: function(deleteData) {
            $("#ViewEmployee").html(deleteData);
          },
        });

        $.ajax({
          url: "viewEmployee.php",
          type: "POST",
          success: function(employeeData) {
            $("#ViewEmployee").html(employeeData);
          },
        });
      }
  })
}


function changeMobileNumber() {
  let newMobileNumber = document.getElementById('lblMobNumber-' + selectedRow).value;

  $.ajax({
    url: "updateNurse.php",
    type: "POST",
    data: {newNumber: newMobileNumber},
    success: function(newDate) {
      $("#ViewEmployee").html(newDate);
    },
  })

  $.ajax({
    url: "viewEmployee.php",
    type: "POST",
    success: function(updatedData) {
      $("#ViewEmployee").html(updatedData);
    },
  })
}

function changeWorkingHours() {
  let newWorkingHours = document.getElementById('lblworkingHours-' + selectedRow).value;

  $.ajax({
    url: "updateNurse.php",
    type: "POST",
    data: {newHours: newWorkingHours},
    success: function(newDate) {
      $("#ViewEmployee").html(newDate);
    },
  })

  $.ajax({
    url: "viewEmployee.php",
    type: "POST",
    success: function(updatedData) {
      $("#ViewEmployee").html(updatedData);
    },
  })
}

function changePassword() {
  let newPassword = document.getElementById('lblPass-' + selectedRow).value;

  $.ajax({
    url: "updateNurse.php",
    type: "POST",
    data: {newPass: newPassword},
    success: function(newDate) {
      $("#ViewEmployee").html(newDate);
    },
  })

  $.ajax({
    url: "viewEmployee.php",
    type: "POST",
    success: function(updatedData) {
      $("#ViewEmployee").html(updatedData);
    },
  })
}
