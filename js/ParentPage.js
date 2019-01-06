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
	var interview = document.getElementById("interview_Date");
	interview.setAttribute("min", today);

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

function interview_Date_max(){
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

	var input = document.getElementById("interview_Date");
	input.setAttribute("max", interDatee);
}

function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "150px";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
}

function AddChild() {

	$("#child_fname").val("");
	$("#child_lname").val("");
	$("#child_bdate").val("");
	$("#gender").val("female");

	document.childform.child_fname.disabled=false;
	document.childform.child_lname.disabled=false;
	document.childform.child_bdate.disabled=false;
	document.childform.gender.disabled=false;
	document.childform.interview_Date.disabled=false;

	$("#hide-child-info").show();
	document.childform.changeChildData.style.display="none";

	document.childform.addNewChild.style.display="block";
	document.getElementById("uploadImgChild").style.display = "block";
	document.getElementById("interview").style.display = "block";
	document.getElementById("payment").style.display = "block";

}

$(document).ready(function() {

	$("#hide-child-info").hide();

	$.ajax({
			url:"fetch.php",
			type:"POST",
			dataType: "json",
			success: function(data){

				console.log(data);

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
				}
			},

	});

	$("#vm").click(function(){
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

				$.ajax({
					url: "update.php",
				 	type: "POST",
					data:  new FormData(this),
				 	contentType: false,
					cache: false,
				 	processData:false,
				 	success: function(data)
					{
						//console.log(data);
						document.ProfilePage.fname.disabled=true;
						document.ProfilePage.lastname.disabled=true;
						document.ProfilePage.Nid.disabled=true;
						document.ProfilePage.email.disabled=true;
						document.ProfilePage.mobile.disabled=true;
						document.ProfilePage.oldpass.disabled=true;
						document.ProfilePage.newpass.disabled=true;
						document.ProfilePage.city.disabled=true;
						document.ProfilePage.neigherhoodName.disabled=true;
						document.ProfilePage.StreetName.disabled=true;
						document.ProfilePage.buildno.disabled=true;
						document.ProfilePage.relativeRelation.disabled=true;
						document.ProfilePage.update.style.display='none';
						document.getElementById("uploadImg").style.display = "none";
					}         
				});
			}));
	});

	$("#edit").click(function(event){
			event.preventDefault();
			
			document.ProfilePage.fname.disabled=false;
			document.ProfilePage.lastname.disabled=false;
			document.ProfilePage.Nid.disabled=false;
			document.ProfilePage.email.disabled=false;
			document.ProfilePage.mobile.disabled=false;
			document.ProfilePage.oldpass.disabled=false;
			document.ProfilePage.newpass.disabled=false;
			document.ProfilePage.city.disabled=false;
			document.ProfilePage.neigherhoodName.disabled=false;
			document.ProfilePage.StreetName.disabled=false;
			document.ProfilePage.buildno.disabled=false;
			document.ProfilePage.relativeRelation.disabled=false;
			
			document.ProfilePage.update.style.display='block';
			document.getElementById("uploadImg").style.display = "block";
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
			 	},
			});

			$.ajax({
				url:"fetchChildImg.php",
				data: {name:child_name},
				type:"POST",
				success: function(data){
					console.log(data);
					$("#imgContainer").attr('src', data);
				},
			});

			document.childform.child_fname.disabled=false;
			document.childform.child_lname.disabled=false;
			document.childform.child_bdate.disabled=false;
			document.childform.gender.disabled=false;

			$("#hide-child-info").show();

			document.childform.changeChildData.style.display="block";
			document.getElementById("uploadImgChild").style.display = "block";

			document.childform.addNewChild.style.display="none";
			document.getElementById("interview").style.display = "none";
			document.getElementById("payment").style.display = "none";
	});

	$("#addNewChild").click(function(){

			$("#childform").on('submit',(function(e) {
				e.preventDefault();

				var payment = $("#paymentList").val();
				var data = new FormData(this);

				data.append("payment", payment);

				$.ajax({
					url: "insertChild.php",
				 	type: "POST",
					data:  data,
				 	contentType: false,
					cache: false,
				 	processData:false,
				 	success: function(data)
					{
						//console.log(data);
					}         
				});
			}));
	});

	$("#changeChildData").click(function(){


		$("#childform").on('submit',(function(e) {
			e.preventDefault();

			var child_id = $("#childrenList").val();
			var data = new FormData(this);

			data.append("id", child_id);

			$.ajax({
				url: "updateChild.php",
				 type: "POST",
				data:  data,
				 contentType: false,
				cache: false,
				 processData:false,
				 success: function(data)
				{
					//console.log(data);
				}         
			});
		}));

		// var extension = $('#image').val().split('.').pop().toLowerCase();
        // if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        // {
        // 	alert('Invalid Image File');
        // 	$('#image').val('');
        // 	return false;
        // }

	});

		$("#ch").click(function(){

			todayDate();
			child_BDate_min();
			interview_Date_max();

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

			$("#paymentList").empty();

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
		});

		// ------------------------------------
		$("#pf").click(function(){
			$(".HideAll").hide();
			$("#Profile").show();
		});

		$("#vm").click(function(){
			$(".HideAll").hide();
			$("#Vmsg").show();
		});

		$("#sm").click(function(){
			$(".HideAll").hide();
			$("#Smsg").show();
		});

		$("#ch").click(function(){
			$(".HideAll").hide();
			$("#ChildProfile").show();
			$("#parent_img").attr("src","http://ssl.gstatic.com/accounts/ui/avatar_2x.png");
		});

		$("#is").click(function(){
			$(".HideAll").hide();
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

