$( document ).ready(function() {
	$.ajax({
			url:"fetch.php",
			type:"POST",
			dataType: "json",
			success: function(data){
				for(var i = 0; i < data.length; i++) {
					var obj = data[i];
					$("#firstname").val(obj.firstname);
					$("#lastname").val(obj.lastname);
					$("#parentemail").val(obj.email);
					$("#mobilenumber").val(obj.mobilenumber);
					$("#nationalid").val(obj.nationalID);
				}
			},
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
// $("#Profile").show();
});

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
	// document.ProfilePage.neigherhoodName.disabled=false;
	// document.ProfilePage.StreetName.disabled=false;
	// document.ProfilePage.buildno.disabled=false;
	document.ProfilePage.submit.style.display='block';

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


$(document).ready(function() {


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

$(document).ready(function() {
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



jQuery.extend({

	dobPicker: function(params) {

		// set the defaults
		if (typeof(params.dayDefault) === 'undefined') params.dayDefault = 'Day';
		if (typeof(params.monthDefault) === 'undefined') params.monthDefault = 'Month';
		if (typeof(params.yearDefault) === 'undefined') params.yearDefault = 'Year';
		if (typeof(params.minimumAge) === 'undefined') params.minimumAge = 12;
		if (typeof(params.maximumAge) === 'undefined') params.maximumAge = 80;

		// set the default messages
		$(params.daySelector).append('<option value="">' + params.dayDefault + '</option>');
		$(params.monthSelector).append('<option value="">' + params.monthDefault + '</option>');
		$(params.yearSelector).append('<option value="">' + params.yearDefault + '</option>');

		// populate the day select
		for (i = 1; i <= 31; i++) {
			if (i <= 9) {
				var val = '0' + i;
			} else {
				var val = i;
			}
			$(params.daySelector).append('<option value="' + val + '">' + i + '</option>');
		}

		// populate the month select
		var months = [
			"January",
			"February",
			"March",
			"April",
			"May",
			"June",
			"July",
			"August",
			"September",
			"October",
			"November",
			"December"
		];

		for (i = 1; i <= 12; i++) {
			if (i <= 9) {
				var val = '0' + i;
			} else {
				var val = i;
			}
			$(params.monthSelector).append('<option value="' + val + '">' + months[i - 1] + '</option>');
		}

		// populate the year select
		var date = new Date();
		var year = date.getFullYear();
		var start = year - params.minimumAge;
		var count = start - params.maximumAge;

		for (i = start; i >= count; i--) {
			$(params.yearSelector).append('<option value="' + i + '">' + i + '</option>');
		}

		// do the logic for the day select
		$(params.daySelector).change(function() {

			$(params.monthSelector)[0].selectedIndex = 0;
			$(params.yearSelector)[0].selectedIndex = 0;
			$(params.yearSelector + ' option').removeAttr('disabled');

			if ($(params.daySelector).val() >= 1 && $(params.daySelector).val() <= 29) {

				$(params.monthSelector + ' option').removeAttr('disabled');

			} else if ($(params.daySelector).val() == 30) {

				$(params.monthSelector + ' option').removeAttr('disabled');
				$(params.monthSelector + ' option[value="02"]').attr('disabled', 'disabled');

			} else if($(params.daySelector).val() == 31) {

				$(params.monthSelector + ' option').removeAttr('disabled');
				$(params.monthSelector + ' option[value="02"]').attr('disabled', 'disabled');
				$(params.monthSelector + ' option[value="04"]').attr('disabled', 'disabled');
				$(params.monthSelector + ' option[value="06"]').attr('disabled', 'disabled');
				$(params.monthSelector + ' option[value="09"]').attr('disabled', 'disabled');
				$(params.monthSelector + ' option[value="11"]').attr('disabled', 'disabled');

			}

		});

		// do the logic for the month select
		$(params.monthSelector).change(function() {

			$(params.yearSelector)[0].selectedIndex = 0;
			$(params.yearSelector + ' option').removeAttr('disabled');

			if ($(params.daySelector).val() == 29 && $(params.monthSelector).val() == '02') {

				$(params.yearSelector + ' option').each(function(index) {
					if (index !== 0) {
						var year = $(this).attr('value');
						var leap = !((year % 4) || (!(year % 100) && (year % 400)));
						if (leap === false) {
							$(this).attr('disabled', 'disabled');
						}
					}
				});
			}
		});
	}
});
