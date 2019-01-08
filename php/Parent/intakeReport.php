<html>

    <head>
        <title> intake report </title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
  
		    $(document).ready(function(){

                var year = (new Date()).getFullYear();

                $.ajax({
                    url:"fetchintake.php",
                    type:"POST",
                    dataType: "json",
                    success: function(data){

                        for(var i = 0; i < data.length; i++) {
                            var obj = data[i];

                            $("#amount").append("Amount: " + obj.cost);
                            $("#childid").append("Child ID: " + obj.child_id);
                            $("#childname").append("Child Name: " + obj.first_name + " " + obj.last_name);
                            $("#cat").append("Category: " + obj.categoryName);
                            $("#currentYear").append("Year: " + year);

                        }
                    },
                    error: function (ts) {
                        $("#error").html(ts.responseText);
                    }
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
        border: 2px solid black;
        padding: 3px;
        margin: 5px;
    }

    img{
        width: 10%;
        height: 10%;
        margin-left: 5% !important;
    }

    #intake-report{
        display: inline;
        margin-left: 69% !important;
    }

</style>
    </head>

    <body>
                <img src="../img/logo.jpg" >
                <p id="intake-report"> <b> Child Intake Report </b> </p>

            <table>
                <tbody>
                    <tr>
                        <td colspan="2"> <b> Intake Information: </b> </td>
                    </tr>
                    <tr>
                        <td> Account Name: Kidz Nursery . Preschool </td>
                        <td> Account Number: 079683533114 </td>
                    </tr>
                    <tr>
                        <td id="amount"> </td>
                        <td> Deposite Currency: Egyption Pound </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <b> Child Information: </b> </td>
                    </tr>
                    <tr>
                        <td id="childid"> </td>
                        <td id="childname"> </td>
                    </tr>
                    <tr>
                        <td id="cat"> </td>
                        <td id="currentYear"> </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <b>Important note: </b> <br>
                                This paper need to be handled to the nurse manager to pay for your child fees, 
                                thier is no other way of payment avaliable. <br>Please make sure to get an offical financial paper signed paper signed from the 
                                nurse manager after payment to avoid any financial problems, thanks.
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
    </body>

</html>