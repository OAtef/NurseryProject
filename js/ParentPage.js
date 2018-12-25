

$( document ).ready(function() {
	$.ajax({
		url:"fetch.php",
		type:"POST",
		dataType: "json",
		success: function(data){
			for(var i = 0; i < data.length; i++) {
				var obj = data[i];
				console.log(obj);
				$("#firstname").val(obj.firstname);
				$("#lastname").val(obj.lastname);
				$("#relativeRelation").val(obj.relativeRelation);
				$("#Parentgender").val(obj.gender);
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
	});

	$("#is").click(function(){
		$(".HideAll").hide();
	});

  $("#VC").click(function(){
  $(".HideAll").hide();
  $("#ViewChildren").show();
});

  $("#VP").click(function(){
  $(".HideAll").hide();
  $("#ViewParents").show();
});


  $("#CL").click(function(){
  $(".HideAll").hide();
  $("#ChildrenList").show();
});

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

	$.dobPicker({
		daySelector: '#dobday', /* Required */
		monthSelector: '#dobmonth', /* Required */
		yearSelector: '#dobyear', /* Required */
		dayDefault: 'Day', /* Optional */
		monthDefault: 'Month', /* Optional */
		yearDefault: 'Year', /* Optional */
		minimumAge: 2, /* Optional */
		maximumAge: 7 /* Optional */
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

function EditProfile() {
	document.ProfilePage.fname.disabled=false;
	document.ProfilePage.lastname.disabled=false;
	document.ProfilePage.Nid.disabled=false;
	document.ProfilePage.email.disabled=false;
	document.ProfilePage.mobile.disabled=false;
	document.ProfilePage.publicinfo.disabled=false;
	document.ProfilePage.oldpass.disabled=false;
	document.ProfilePage.newpass.disabled=false;
	document.ProfilePage.city.disabled=false;
	document.ProfilePage.neigherhoodName.disabled=false;
	document.ProfilePage.StreetName.disabled=false;
	document.ProfilePage.buildno.disabled=false;
	document.ProfilePage.relativeRelation.disabled=false;
	document.ProfilePage.Parentgender.disabled=false;
	document.ProfilePage.update.style.display='block';
	document.getElementById("uploadImg").style.display = "block";
}

function EditChild() {
	document.childform.fname.disabled=false;
	document.childform.lastname.disabled=false;
	document.childform.dobday.disabled=false;
	document.childform.dobmonth.disabled=false;
	document.childform.dobyear.disabled=false;
	document.childform.Invoice.disabled=false;
	document.childform.cat.disabled=false;
	document.childform.confirm.style.display='block';
}

function AddChild() {
	document.childform.fname.disabled=false;
	document.childform.lastname.disabled=false;
	document.childform.dobday.disabled=false;
	document.childform.dobmonth.disabled=false;
	document.childform.dobyear.disabled=false;
	document.childform.Invoice.disabled=false;
	document.childform.cat.disabled=false;
	document.childform.confirm.style.display='block';
	document.getElementById("confirm1").innnerHTML="Add New Child";
}


