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

  todayDate();
  maxInterviewDate();

});

// to change the labels in the tables

function DeleteParent() {

  $.ajax({
    url: "DeleteParent.php",
    type: "POST",
    data: 'ParentID='+$(selectedID).text(),
    success: function(deleteParent) {
      $("#ViewParents").html(deleteParent);

      $.ajax({
        url: "ViewParent.php",
        type: "POST",
        success: function(parentsData) {
          $("#ViewParents").html(parentsData);
        },
      })
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

      $.ajax({
        url: "ViewChildren.php",
        type: "POST",
        success: function(childrenData) {
          $("#ChildrenList").html(childrenData);
        },
      })
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
        success: function(approveData) {
          $("#ViewInterview").html(approveData);
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

      $("#ViewInterview").html(rejectChild);

      $.ajax({
        url: "ViewInterview.php",
        type: "POST",
        success: function(rejectData) {
          $("#ViewInterview").html(rejectData);
        },
      })
    },
  })
}

function addCommentSon(){
  let comment = document.getElementById('CommentSon-' + selectedRow).value;

  $.ajax({
    url: "setCommentson.php",
    type: "POST",
    data: {Comment: comment, ChildID: $(selectedID).text()},
    success: function(newDate) {
      $("#ChildrenList").html(newDate);
    },
  })

  $.ajax({
    url: "ViewChildren.php",
    type: "POST",
    success: function(childrenData) {
      $("#ChildrenList").html(childrenData);
    },
  })
}

function changeInterviewDate() {
  let newInterviewDate = document.getElementById('InterviewDate-' + selectedRow).value;

  $.ajax({
    url: "setInterviewDate.php",
    type: "POST",
    data: {newInterviewDate: newInterviewDate, ChildID: $(selectedID).text()},
    success: function(newDate) {
      $("#ChildrenList").html(newDate);
    },
  })

  $.ajax({
    url: "ViewChildren.php",
    type: "POST",
    success: function(childrenData) {
      $("#ChildrenList").html(childrenData);
    },
  })
}

function todayDate(){

// min is today

	var today = new Date();
	var day = today.getDate();
	var month = today.getMonth()+1; //January is 0!
	var year = today.getFullYear();

	if(day<10) {
		day = '0'+day
	}

	if(month<10) {
		month = '0'+month
	}

	today = year + '-' + month + '-' + day;

  let interview = document.getElementById('InterviewDate-' + selectedRow);
	interview.setAttribute("min", today);
}

function maxInterviewDate(){

  // max is a month

  var interDatee = new Date();
  var day = interDatee.getDate();
  var month = interDatee.getMonth()+2; //January is 0!
  var year = interDatee.getFullYear();

  if(day<10) {
    day = '0'+day
  }

  if(month<10) {
    month = '0'+month
  }

  if(month > 12){
    month ='0'+1
    year++
  }

  interDatee = year + '-' + month + '-' + day;

  let interview = document.getElementById('InterviewDate-' + selectedRow);
  interview.setAttribute("max", interDatee);
}
