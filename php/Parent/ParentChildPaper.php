<html>
    <head>
        <title> intake report </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
  
		    $(document).ready(function(){

                $.ajax({
                    url:"fetchInterviewData.php",
                    type:"POST",
                    dataType: "json",
                    success: function(data){

                        for(var i = 0; i < data.length; i++) {
                            var obj = data[i];

                            $("#interview_date").append("Interview Date: " + obj.interviewdate);
                            $("#parentName").append("Parent Name: " + obj.firstname + " " + obj.lastname);
                            $("#email").append("Parent Email: " + obj.email);
                            $("#mobNumber").append("Mobile Number: " + obj.mobilenumber);
                            $("#relativeRelation").append("Relative Relation: " + obj.relativeRelation);
                            $("#nationalID").append("National ID: " + obj.nationalID);

                            $("#childName").append("Child Name: " + obj.first_name + " " + obj.last_name);
                            $("#childID").append("Child ID: " + obj.child_id);
                            $("#bdate").append("Birth Date: " + obj.Bdate);
                            $("#cat").append("Category: " + obj.categoryName);

                            if(obj.categoryName == "pre-school"){
                                $("#interview-paper").append("<b> Parent and Child Interview </b>");
                                $("#note").append("<b> Note: </b> this is a parent child interview as your child is 5 years and above he/she must attend the interview, thanks");
                            }else{
                                $("#interview-paper").append("<b> Parent Interview </b>");
                            }

                        }
                    },
                });

                $.ajax({
                    url:"fetchParentImg.php",
                    type:"POST",
                    success: function(data){
                        console.log(data);
                        if(data == 'data:image/jpeg;base64,')
                            $("#parentImg").attr('src', "../img/No_Image_Available.jpg");
                        else
                            $("#parentImg").attr('src', data);
                    },
                    error: function (ts) {
                        $("#error").html(ts.responseText);
                    }
                });

                $.ajax({
                    url:"ChildImgPaper.php",
                    type:"POST",
                    success: function(data){
                        if(data == 'data:image/jpeg;base64,')
                            $("#childImg").attr('src', "../../img/No_Image_Available.jpg");
                        else
                            $("#childImg").attr('src', data);
                    },
                    
                });

				window.print();
				history.pushState(null, null, location.href);
				window.onpopstate = function(){
					history.go(1);
			    }
			});
        </script>      

<style>
    table{
        width: 90%;
		margin-left: 5% !important;
    }
    table, td{
        border: 1px solid black;
        padding: 3px;
        margin: 5px;
    }

    #logo{
        width: 10%;
        height: 10%;
        margin-left: 5% !important;
    }

    .img{
        padding: 2px;
        float: right;
        height: 200px;
        width: 270px;
    }

    #interview-paper{
        display: inline;
        margin-left: 65% !important;
    }
    #note{
        margin-left: 5%;
        
    }

</style>
    </head>

    <body>
        <div id="text">
        <div id="error"></div>

                <img id="logo" src="../../img/logo.jpg" >
                <p id="interview-paper">  </p>

            <table>
                <tbody>
                    <tr>
                        <td> Kidz Nursery . Preschool </td>
                        <td id="interview_date"> </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <b> Parent Information: </b> </td>
                    </tr>
                    <tr>
                        <td id="parentName"> </td>
                        <td rowspan="2" width="20%"> <img class="img" id="parentImg"/>  </td>
                    </tr>
                    <tr>
                        <td id="email"> </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="relativeRelation"> </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="mobNumber"> </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="nationalID"> </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <b> Child Information: </b> </td>
                    </tr>
                    <tr>
                        <td id="childName"> </td>
                        <td rowspan="2"  width="20%"> <img class="img" id="childImg" />  </td>
                    </tr>
                    <tr>
                        <td id="childID"> </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="bdate"> </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="cat"> </td>
                    </tr>

                   
                </tbody>
            </table>
            <p id="note"> </p>
        </div>        
    </body>

</html>