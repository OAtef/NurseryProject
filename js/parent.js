function todayDate(){
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

	var child = document.getElementById("child_bdate");
	child.setAttribute("max", today);
	//var interview = document.getElementById("interview_Date");
	//interview.setAttribute("min", today);

}

function child_BDate_min(){
	var childBDate = new Date();
	var day = childBDate.getDate();
	var month = childBDate.getMonth()+1; //January is 0!
	var year = childBDate.getFullYear();

	if(day<10) {
		day = '0'+day
	}

	if(month<10) {
		month = '0'+month
	}

	childBDate = (year-6) + '-' + month + '-' + day;

	var input = document.getElementById("child_bdate");
	input.setAttribute("min", childBDate);
}

// function interview_Date_max(){
// 	var interDatee = new Date();
// 	var day = interDatee.getDate();
// 	var month = interDatee.getMonth()+2; //January is 0!
// 	var year = interDatee.getFullYear();

// 	if(day<10) {
// 		day = '0'+day
// 	}

// 	if(month<10) {
// 		month = '0'+month
// 	}

// 	if(month > 12){
// 		month ='0'+1
// 		year++
// 	}

// 	interDatee = year + '-' + month + '-' + day;

// 	var input = document.getElementById("interview_Date");
// 	input.setAttribute("max", interDatee);
// }

function imageValidation(file = ''){
	if(fileSize > 16777215){ // 16 MB
		// alert msg (picture size is huge)
		alert("picture size is huge");
		return false;
	}
	else{
		var extension = $('#imageParent').val().split('.').pop().toLowerCase();
		console.log(extension);
		if(extension != 'jpg' && extension != 'png' && extension != 'gif' && extension != 'jpeg'){
			// alert msg (invalid Image Extention )
			alert("invalid Image Extention -- Image type is invalid");
			return false;
		}
	}
}

$(document).ready(function() {

	$("#hide-child-info").hide();

	$.ajax({
		url:"fetch.php",
		type:"POST",
		dataType: "json",
		success: function(data){
			for(var i = 0; i < data.length; i++) {
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
			}
		},
	});

	$.ajax({
		url:"fetchParentImg.php",
		type:"POST",
		success: function(data){
			if(data == 'data:image/jpeg;base64,')
				$("#ParentImgContainer").attr('src', "http://ssl.gstatic.com/accounts/ui/avatar_2x.png");
			else
				$("#ParentImgContainer").attr('src', data);
		},
	});

	$.ajax({
		url:"childList.php",
		type:"POST",
		dataType: "json",
		success: function(data){
			for(var i = 0; i < data.length; i++) {
				var obj = data[i];
				$("<option value='"+obj.child_id+"'>"+obj.first_name+"</option>").appendTo("#childrenList");
			}
		},
	});

	$.ajax({
		url:"paymentList.php",
		type:"POST",
		dataType: "json",
		success: function(data){
			for(var i = 0; i < data.length; i++) {
				var obj = data[i];
				$("#paymentList").append("<option value='"+obj.invoiceNo+"'>"+obj.payment_type+"</option>");
			}
		},
	});

	$("#vm").click(function(){

		$(".HideAll").hide();
		$("#Vmsg").show();

		$.ajax({
			url:"viewMsg.php",
			type:"POST",
			success: function(msgData){
				$("#Vmsg").html(msgData);
			},
		})
	});

	$("#update").click(function(){
		$("#ProfilePage").on('submit',(function(e) {
			e.preventDefault();

			// var data = new FormData(this);

			// for (var pair of data.entries()) {
			//  	console.log(pair[0]+ ', ' + pair[1]); 
			// }

			$.ajax({
				url: "update.php",
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					//$("#errormsg").html(data);

					// notification to ay added sucessfully

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

					$("#update").css("display", "none");
					$("#uploadImg").css("display", "none");
				}         
			});

		}));
	});

	$("#edit").click(function(event){
		event.preventDefault();

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
	});

	$("#editChild").click(function(event){
		event.preventDefault();

		var child_name = $("#childrenList").find(":selected").text();

		$.ajax({
			 url:"fetchChild.php",
			 data: {name:child_name},
			 type:"POST",
			 dataType: "json",
			 success: function(data){
				 var obj = data[0];

				 $("#child_fname").val(obj.first_name);
				 $("#child_lname").val(obj.last_name);
				 $("#child_bdate").val(obj.Bdate);
				 $("#gender").val(obj.Gender);

				if(obj.interviewdate == null){

					// notification msg (your request is under our concentration)
					alert("your request is under our concentration");

				}
				else{

					$('#child_fname').prop("disabled", false);
					$('#child_lname').prop("disabled", false);
					$('#gender').prop("disabled", false);
					$('#child_bdate').prop("disabled", false);

					$("#changeChildData").css("display", "block");
					$("#uploadImgChild").css("display", "block");
			
				}
			 },
		});

		$.ajax({
			url:"fetchChildImg.php",
			data: {name:child_name},
			type:"POST",
			success: function(data){
				if(data == 'data:image/jpeg;base64,')
				$("#ChildImgContainer").attr('src', "http://ssl.gstatic.com/accounts/ui/avatar_2x.png");
			else
				$("#ChildImgContainer").attr('src', data);
			},
		});

		$("#hide-child-info").show();
		document.childform.addNewChild.style.display="none";
		//document.getElementById("interview").style.display = "none";
		document.getElementById("payment").style.display = "none";
	});

	$("#addNewChild").click(function(){

		if($("#image").val() != ''){
			fileSize = $("#image")[0].files[0].size //size in bytes
			imageValidation(fileSize);
		}

		$("#childform").on('submit',(function(e) {
			e.preventDefault();

			var payment = $("#paymentList").val();
			var data = new FormData(this);

			data.append("payment", payment);

			$.ajax({
				url: "insertChild.php",
				 type: "POST",
				data: data,
				contentType: false,
				cache: false,
				 processData:false,
				 success: function(data)
				{
					// notification to ay added sucessfully

					$("#childrenList").empty();

					$.ajax({
						url:"childList.php",
						type:"POST",
						dataType: "json",
						success: function(data){
							for(var i = 0; i < data.length; i++) {
								var obj = data[i];
								$("<option value='"+obj.child_id+"'>"+obj.first_name+"</option>").appendTo("#childrenList");
							}
						},
					});

					$('#child_fname').prop("disabled", true);
					$('#child_lname').prop("disabled", true);
					$('#gender').prop("disabled", true);
					$('#child_bdate').prop("disabled", true);
					//document.childform.interview_Date.disabled=true;
				
					$("#hide-child-info").hide();

					$("#addNewChild").css("display", "none");
					$("#uploadImgChild").css("display", "none");
					$("#payment").css("display", "none");
					//document.getElementById("interview").style.display = "none";
				}         
			});
		}));
	});

	$("#changeChildData").click(function(){
		$("#childform").on('submit',(function(e) {
			e.preventDefault();

			var data = new FormData(this);

			var child_id = $("#childrenList").val();
			data.append("id", child_id);
			
			// for (var pair of data.entries()) {
			//  	console.log(pair[0]+ ', ' + pair[1]); 
			// }

			$.ajax({
				url: "updateChild.php",
				type: "POST",
				data:  data,
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					//$("#errormsg").html(data);

					// notification to say changed sucessfully

					$('#child_fname').prop("disabled", true);
					$('#child_lname').prop("disabled", true);
					$('#gender').prop("disabled", true);
					$('#child_bdate').prop("disabled", true);
				
					$("#changeChildData").css("display", "none");
					$("#uploadImgChild").css("display", "none");
				}         
			});
		}));
	});

	$("#ch").click(function(){
		todayDate();
		child_BDate_min();
		//interview_Date_max();

		$(".HideAll").hide();
		$("#ChildProfile").show();
	});

	// ------------------------------------
	$("#pf").click(function(){
			$(".HideAll").hide();
			$("#Profile").show();
	});

	$("#sm").click(function(){
			$(".HideAll").hide();
			$("#Smsg").show();
	});

	//---------------- Show IMG on HTML ------------------
	var readURL = function(input) {
		 	if (input.files && input.files[0]) {
		 		var reader = new FileReader();
		 		reader.onload = function (e) {
		 			$('.avatar').attr('src', e.target.result);
		 		}
		 		reader.readAsDataURL(input.files[0]);
		 	}
	}

	$(".file-upload").on('change', function(){
			readURL(this);
	});
});

function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "150px";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
}

function AddChild() {

	$("#image").prop("required", true);
	$("#ChildImgContainer").attr("src","http://ssl.gstatic.com/accounts/ui/avatar_2x.png");

	$("#child_fname").val("");
	$("#child_lname").val("");
	$("#child_bdate").val("");
	$("#gender").val("female");


	$('#child_fname').prop("disabled", false);
	$('#child_lname').prop("disabled", false);
	$('#gender').prop("disabled", false);
	$('#child_bdate').prop("disabled", false);
	//document.childform.interview_Date.disabled=false;

	$("#hide-child-info").show();

	$("#changeChildData").css("display", "none");
	$("#addNewChild").css("display", "block");
	$("#uploadImgChild").css("display", "block");
	$("#payment").css("display", "block");
	//document.getElementById("interview").style.display = "block";
}