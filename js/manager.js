var selectedID;
var childID;
var selectedRow;

$(document).ready(function() {

  $("#pf").click(function() {
    $(".HideAll").hide();
    $("#Profile").show();
  });

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

  $("#VI").click(function() {
    $(".HideAll").hide();
    $("#ChildrenList").empty();
    $("#ViewParents").empty();
    $("#ViewInterview").show();

    $.ajax({
      url: "ViewInterview.php",
      type: "POST",
      success: function(requestsData) {
        $("#ViewInterview").html(requestsData);
      },
    })
  });

  $("#VP").click(function() {
    $(".HideAll").hide();
    $("#ChildrenList").empty();
    $("#ViewInterview").empty();
    $("#ViewParents").show();

    $.ajax({
      url: "ViewParent.php",
      type: "POST",
      success: function(parentsData) {
        $("#ViewParents").html(parentsData);
      },
    })
  });

  $("#CL").click(function() {
    $(".HideAll").hide();
    $("#ViewParents").empty();
    $("#ViewInterview").empty();
    $("#ChildrenList").show();

    $.ajax({
      url: "ViewChildren.php",
      type: "POST",
      success: function(childrenData) {
        $("#ChildrenList").html(childrenData);
      },
    })
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

// Table.js

$(document).on("click",".row", function(){
  extraRowClass = ".extra-data-" + $(this).prop("class").split(" ")[1];
  $(extraRowClass).slideToggle(50);
});

$(document).on("mouseenter",".row", function(){
  selectedID = ".lblID-" + $(this).prop("class").split(" ")[1];
  childID = ".lblChildID-" + $(this).prop("class").split(" ")[1];
  selectedRow = $(this).prop("class").split(" ")[1];
});

// to change the labels in the tables

function DeleteParent() {

  $.ajax({
    url: "DeleteParent.php",
    type: "POST",
    data: 'ParentID='+$(selectedID).text(),
    success: function(deleteParent) {
      $("#ViewParents").html(deleteParent);
    },
  })
}

function DeleteChild() {

  $.ajax({
    url: "deleteChild.php",
    type: "POST",
    data: 'ChidlID='+$(selectedID).text(),
    success: function(deleteChild) {
      $("#ChildrenList").html(deleteChild);
    },
  })
}

function ApproveInterview() {

  $.ajax({
    url: "ApproveInterview.php",
    type: "POST",
    data: 'ChildIDApprove='+$(childID).text(),
    success: function(approveChild) {

      $("#ViewInterview").html(approveChild);

      $.ajax({
        url: "ViewInterview.php",
        type: "POST",
        success: function(requestsData) {
          $("#ViewInterview").html(requestsData);
        },
      })
    },
  })
}

function RejectInterview() {

  $.ajax({
    url: "RejectInterview.php",
    type: "POST",
    data: 'ChildIDReject='+$(childID).text(),
    success: function(rejectChild) {
      // $("#ViewInterview").html(deleteChild);
    },
  })
}

function changeInterviewDate() {
  let newParentName = document.getElementById('InterviewDate-' + selectedRow).value;

  alert(newParentName);
}
