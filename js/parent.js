var rr = null;

$(document).ready(function() {

  $("#hide-child-info").hide();
  var childid = null;

  $.ajax({
    url: "fetch.php",
    type: "POST",
    dataType: "JSON",
    success: function(data) {

      for (var i = 0; i < data.length; i++) {
        var obj = data[i];

        $("#firstname").val(obj.firstname);
        $("#lastname").val(obj.lastname);
        $("#relativeRelation").val(obj.relativeRelation);
        $("#parentemail").val(obj.email);
        $("#mobilenumber").val(obj.mobilenumber);
        $("#nationalid").val(obj.nationalID);
        $("#city").val(obj.city);
        $("#neigherhoodName").val(obj.neigherhoodName);
        $("#StreetName").val(obj.StreetName);
        $("#buildno").val(obj.buildingNo);
        $("#genderr").val(obj.gender);

        rr = obj.relativeRelation;

        if(rr == null){
          EditProfile();
          $("#imageParent").prop("required", true);
        }


      }
    },
  });

  $.ajax({
    url: "fetchParentImg.php",
    type: "POST",
    success: function(data) {
      if (data == 'data:image/jpeg;base64,')
        $("#ParentImgContainer").attr('src', "http://ssl.gstatic.com/accounts/ui/avatar_2x.png");
      else
        $("#ParentImgContainer").attr('src', data);
    },
  });

  $.ajax({
    url: "childList.php",
    type: "POST",
    dataType: "json",
    success: function(data) {
      for (var i = 0; i < data.length; i++) {
        var obj = data[i];
        $("<option value='" + obj.child_id + "'>" + obj.first_name + "</option>").appendTo("#childrenList");
      }
    },
  });

  $("#home").click(function() {
    if(rr == null){
      Swal({
        type: 'error',
        title: 'You need to complete your information first',
        showConfirmButton: true
      });
      return false;
    }

  });

  $("#vm").click(function() {

    $(".HideAll").hide();
    $("#Vmsg").show();

    $.ajax({
      url: "../viewMsg.php",
      type: "POST",
      success: function(msgData) {
        $("#Vmsg").html(msgData);
      },
    })
  });

  $("#Send_Msg").click(function() {

    senderMail = $("#SendingEmail").val();
    message = $("#message").val();

    $.ajax({
      url: "../SendMsg.php",
      type: "POST",
      data: {Mail: senderMail, Message: message},
      success: function(msgData) {
        $("#SmsgResults").html(msgData);
      },
    })
  });

  $("#update").click(function() {
    $("#ProfilePage").on('submit', (function(e) {
      e.preventDefault();

      rr =  $('#relativeRelation').val();

      imageValidation("imageParent");

      var data = new FormData(this);
      var national = $('#nationalid').val();
      data.append("Nid", national);

      //  for (var pair of data.entries()) {
      //    console.log(pair[0] + ', ' + pair[1]);
      //  }

      $.ajax({
        url: "update.php",
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function() {
					 Swal({
		         type: 'success',
		         title: 'Account Updated Successfully',
		         showConfirmButton: true
             });

          $('#firstname').prop("disabled", true);
          $('#lastname').prop("disabled", true);
          $('#genderr').prop("disabled", true);
          $('#relativeRelation').prop("disabled", true);
          $('#parentemail').prop("disabled", true);
          $('#mobilenumber').prop("disabled", true);
          $('#oldpass').prop("disabled", true);
          $('#newpass').prop("disabled", true);
          $('#neigherhoodName').prop("disabled", true);
          $('#city').prop("disabled", true);
          $('#StreetName').prop("disabled", true);
          $('#buildno').prop("disabled", true);
          $('#nationalid').prop("disabled", true);

          $("#update").css("display", "none");
          $("#uploadImg").css("display", "none");
        },//error: function(data){
          //console.log(data);
          // $("#errormsg").html(data.responseText);
         //}
      });

    }));
  });

  $("#editChild").click(function(event) {
    event.preventDefault();

    childid = $("#childrenList").find(":selected").val();

    $.ajax({
      url: "fetchChild.php",
      data: {
        ID: childid
      },
      type: "POST",
      dataType: "json",
      success: function(data) {
        var obj = data[0];

        $("#interview_state").css("display", "block");

        if (obj.accepted == 0) { // pending

          $('#hide-rejected').show();

          // notification msg (your request is under our concentration)

          $("#interState").val("Pending");

          if (obj.interviewdate != null) {

            $("#interview").css("display", "block");
            $("#interviewbtn").css("display", "block");
            $("#interview_Date").val(obj.interviewdate);

          }

          $("#child_fname").val(obj.first_name);
          $("#child_lname").val(obj.last_name);
          $("#child_bdate").val(obj.Bdate);
          $("#gender").val(obj.Gender);

          $('#child_fname').prop("disabled", true);
          $('#child_lname').prop("disabled", true);
          $('#gender').prop("disabled", true);
          $('#child_bdate').prop("disabled", true);

          $("#changeChildData").css("display", "none");
          $("#intakebtn").css("display", "none");
          $("#deleChild").css("display", "none");
          $("#uploadImgChild").css("display", "none");

        } else if (obj.accepted == 1) { // accepted

          $('#hide-rejected').show();

          $("#interview").css("display", "none");
          $("#interviewbtn").css("display", "none");

          $("#interview_state").css("display", "block");
          $("#interState").val("Accepted");

          $("#child_fname").val(obj.first_name);
          $("#child_lname").val(obj.last_name);
          $("#child_bdate").val(obj.Bdate);
          $("#gender").val(obj.Gender);

          $('#child_fname').prop("disabled", false);
          $('#child_lname').prop("disabled", false);
          $('#gender').prop("disabled", false);
          $('#child_bdate').prop("disabled", false);

          $("#changeChildData").css("display", "inline-block");
          $("#intakebtn").css("display", "inline-block");
          $("#deleChild").css("display", "inline-block");
          $("#uploadImgChild").css("display", "block");


        } else if (obj.accepted == 2) { // rejected

          $('#hide-rejected').hide();

          $("#interview").css("display", "none");
          $("#interviewbtn").css("display", "none");

          $("#interview_state").css("display", "block");
          $("#interState").val("Rejected");

          $("#changeChildData").css("display", "none");
          $("#intakebtn").css("display", "none");
          $("#deleChild").css("display", "none");
          $("#uploadImgChild").css("display", "none");

        }
      },
    });

    $.ajax({
      url: "fetchChildImg.php",
      data: {
        ID: childid
      },
      type: "POST",
      success: function(data) {
        if (data == 'data:image/jpeg;base64,')
          $("#ChildImgContainer").attr('src', "http://ssl.gstatic.com/accounts/ui/avatar_2x.png");
        else
          $("#ChildImgContainer").attr('src', data);
      },
    });

    $("#hide-child-info").show();
    $("#addNewChild").css("display", "none");
  });

  $("#intakebtn").click(function(event) {
    event.preventDefault();

    window.open('intakeReport.php');

  });

  $("#deleChild").click(function(event) {
    event.preventDefault();

    $.ajax({
      url: "reqDeleteChild.php",
      type: "POST",
      data: "child="+childID,
      contentType: false,
      cache: false,
      processData: false,
      success: function() {
        Swal({
          type: 'success',
          title: 'Request of deletation is sent successfully',
          showConfirmButton: true
        });
      },
      error: function(){
        Swal({
          type: 'error',
          title: 'Request is failed to be send',
          showConfirmButton: true
        });
      }
    });
  });

  $("#interviewbtn").click(function(event) {

    event.preventDefault();

    window.open('ParentChildPaper.php');

  });

  $("#addNewChild").click(function() {
    $("#childform").on('submit', (function(e) {
      e.preventDefault();

      imageValidation("image");

      $.ajax({
        url: "insertChild.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
					 Swal({
		         type: 'success',
		         title: 'Child Added Successfully',
		         showConfirmButton: true
		       });

          $("#childrenList").empty();

          $.ajax({
            url: "childList.php",
            type: "POST",
            dataType: "json",
            success: function(data) {
              for (var i = 0; i < data.length; i++) {
                var obj = data[i];
                $("<option value='" + obj.child_id + "'>" + obj.first_name + "</option>").appendTo("#childrenList");
              }
            },
          });

          $('#child_fname').prop("disabled", true);
          $('#child_lname').prop("disabled", true);
          $('#gender').prop("disabled", true);
          $('#child_bdate').prop("disabled", true);

          $("#hide-child-info").hide();

          $("#addNewChild").css("display", "none");
          $("#uploadImgChild").css("display", "none");
        }
      });
    }));
  });

  $("#changeChildData").click(function() {
    $("#childform").on('submit', (function(e) {
      e.preventDefault();

      imageValidation("image");

      var data = new FormData(this);

      var child_id = $("#childrenList").val();
      data.append("id", child_id);

      // for (var pair of data.entries()) {
      //  	console.log(pair[0]+ ', ' + pair[1]);
      // }

      $.ajax({
        url: "updateChild.php",
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          //$("#errormsg").html(data);

					Swal({
		        type: 'success',
		        title: 'Child Updated Successfully',
		        showConfirmButton: true
		      });

          $('#child_fname').prop("disabled", true);
          $('#child_lname').prop("disabled", true);
          $('#gender').prop("disabled", true);
          $('#child_bdate').prop("disabled", true);

          $("#changeChildData").css("display", "none");
          $("#intakebtn").css("display", "none");
          $("#deleChild").css("display", "none");
          $("#uploadImgChild").css("display", "none");
        }
      });
    }));
  });

  $("#ch").click(function() {
    todayDate();
    child_BDate_min();

    $(".HideAll").hide();
    $("#ChildProfile").show();
  });

  // ------------------------------------
  $("#pf").click(function() {
    $(".HideAll").hide();
    $("#Profile").show();
  });

  $("#sm").click(function() {
    $(".HideAll").hide();
    $("#Smsg").show();
  });

  //---------------- Show IMG on HTML ------------------
  $(".file-upload").on('change', function() {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('.avatar').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });
});

function openNav() {
  if(rr == null){
    Swal({
      type: 'error',
      title: 'You need to complete your information first',
      showConfirmButton: true
    });
  }
  else{
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "150px";
  }
}

function closeNav() {

  document.getElementById("mySidenav").style.width = "0";
   document.getElementById("main").style.marginLeft = "0";
}

function AddChild() {

  $("#image").prop("required", true);
  $("#ChildImgContainer").attr("src", "http://ssl.gstatic.com/accounts/ui/avatar_2x.png");

  $("#child_fname").val("");
  $("#child_lname").val("");
  $("#child_bdate").val("");
  $("#gender").val("female");


  $('#child_fname').prop("disabled", false);
  $('#child_lname').prop("disabled", false);
  $('#gender').prop("disabled", false);
  $('#child_bdate').prop("disabled", false);

  $("#hide-child-info").show();

  $("#interview_state").css("display", "none");
  $("#interview").css("display", "none");
  $("#changeChildData").css("display", "none");
  $("#intakebtn").css("display", "none");
  $("#deleChild").css("display", "none");
  $("#interviewbtn").css("display", "none");
  $("#addNewChild").css("display", "block");
  $("#uploadImgChild").css("display", "block");

}

function EditProfile() {
  $('#firstname').prop("disabled", false);
  $('#lastname').prop("disabled", false);
  $('#genderr').prop("disabled", false);
  $('#relativeRelation').prop("disabled", false);
  $('#parentemail').prop("disabled", false);
  $('#mobilenumber').prop("disabled", false);
  $('#oldpass').prop("disabled", false);
  $('#newpass').prop("disabled", false);
  $('#neigherhoodName').prop("disabled", false);
  $('#city').prop("disabled", false);
  $('#StreetName').prop("disabled", false);
  $('#buildno').prop("disabled", false);

  // $('#update').show();
  // $('#uploadImg').show();

  $("#update").css("display", "block");
  $("#uploadImg").css("display", "block");


}

function todayDate() {
  var today = new Date();
  var day = today.getDate();
  var month = today.getMonth() + 1; //January is 0!
  var year = today.getFullYear();

  if (day < 10) {
    day = '0' + day
  }

  if (month < 10) {
    month = '0' + month
  }

  today = year + '-' + month + '-' + day;

  var child = document.getElementById("child_bdate");
  child.setAttribute("max", today);
}

function child_BDate_min() {
  var childBDate = new Date();
  var day = childBDate.getDate();
  var month = childBDate.getMonth() + 1; //January is 0!
  var year = childBDate.getFullYear();

  if (day < 10) {
    day = '0' + day
  }

  if (month < 10) {
    month = '0' + month
  }

  childBDate = (year - 6) + '-' + month + '-' + day;

  var input = document.getElementById("child_bdate");
  input.setAttribute("min", childBDate);
}

function imageValidation(file = '') {

  var fileInput =  document.getElementById(file);
  fileSize = fileInput.files[0].size;
 if (fileSize > 16777215) { // 16 MB
   Swal({
     type: 'error',
     title: 'Picture size is huge',
     showConfirmButton: true
   });

   return false;
 } else {
    var extension = $('#'+file).val().split('.').pop().toLowerCase();
    if(extension != 'jpg' && extension != '' && extension != 'png' && extension != 'gif' && extension != 'jpeg'){
      Swal({
        type: 'error',
        title: 'Image Extension is Invalid -- valid Extensions (JPG , PNG , GIF , JPEG)',
        showConfirmButton: true
      });
      return false;
    }
 }
}
