$(document).ready(function() {

  $("#vm").click(function() {
    $.ajax({
      url: "viewMsg.php",
      type: "POST",
      success: function(msgData) {
        $("#Vmsg").html(msgData);
      },
    })
  });

  $("#update").click(function() {
    $.ajax({
      url: "update.php",
      data: $('#ProfilePage').serialize(), // takes all data in the form in a string
      type: "POST",
      success: function(data) {
        //alert("successfully done");
      },
    });
  });

  $("#vm").click(function() {
    $(".HideAll").hide();
    $("#Vmsg").show();
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

  // $("#VP").click(function() {
  //   $(".HideAll").hide();
  //   $("#ViewParents").show();
  // });

  var readURL = function(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('.avatar').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $(".file-upload").on('change', function() {
    readURL(this);
  });

  $.dobPicker({
    daySelector: '#dobday',
    /* Required */
    monthSelector: '#dobmonth',
    /* Required */
    yearSelector: '#dobyear',
    /* Required */
    dayDefault: 'Day',
    /* Optional */
    monthDefault: 'Month',
    /* Optional */
    yearDefault: 'Year',
    /* Optional */
    minimumAge: 2,
    /* Optional */
    maximumAge: 7 /* Optional */
  });
  $.dobPicker({
    daySelector: '#dointday',
    /* Required */
    monthSelector: '#dointmonth',
    /* Required */
    yearSelector: '#dointyear',
    /* Required */
    dayDefault: 'Day',
    /* Optional */
    monthDefault: 'Month',
    /* Optional */
    yearDefault: 'Year',
    /* Optional */
    minimumAge: 2,
    /* Optional */
    maximumAge: 7 /* Optional */
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

function EditProfile() {
  document.ProfilePage.fname.disabled = false;
  document.ProfilePage.lastname.disabled = false;
  document.ProfilePage.Nid.disabled = false;
  document.ProfilePage.email.disabled = false;
  document.ProfilePage.mobile.disabled = false;
  document.ProfilePage.oldpass.disabled = false;
  document.ProfilePage.newpass.disabled = false;
  document.ProfilePage.city.disabled = false;
  document.ProfilePage.neigherhoodName.disabled = false;
  document.ProfilePage.StreetName.disabled = false;
  document.ProfilePage.buildno.disabled = false;
  document.ProfilePage.relativeRelation.disabled = false;
  document.ProfilePage.update.style.display = 'block';
  document.getElementById("uploadImg").style.display = "block";
}

function EditEmployee() {


}

function AddEmployee() {


}
