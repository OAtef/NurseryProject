<?php
include('SendMsg.php');
?>
<html>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/parent.css">
<head>

   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../welcomePage.php">Home</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a id="Pic-btn"><span class=""></span> Pic</a></li>

        <li class='dropdown'>
             <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Name
             <span class='caret'></span></a>
             <ul class='dropdown-menu'>
               <li><a href='#'>Logout</a></li>
             </ul>
           </li>
        </ul>

  </div>
</nav>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#"  id="pf">Profile</a>
  <a href="#"  id="vm">View Msg</a>
  <a href="#"  id="sm">Send Msg</a>
  <a href="#"  id="ch"> Child</a>

</div>

</head>
<body>

<div id="main">

<div class="container HideAll" id="Vmsg" style="display: none">

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Collapsible Group 1</a>
        </h4>
      </div>
      <div id="collapse1"class="panel-collapse collapse ">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
</div>
</div>

 <div class="container HideAll" id="Smsg" style="display: none">
        <div class="row">
    <div class="col-md-6 col-md-offset-3" id="form_container">
        <h2>Contact Us</h2>
        <p>
           Please send your message below. We will get back to you at the earliest!
        </p>
        <form role="form" method="post" id="reused_form">

        <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="email">
                        Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="message">
                        Message:</label>
                    <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg btn-default pull-right" name="Send_Msg">Send &rarr;</button>
                </div>
            </div>

        </form>
       </div>
    </div>
  </div>

  <?php include('errors.php');
        if (isset($MessageSentScript)) {
          echo $MessageSentScript;
        }
  ?>


<!-- Profile -->

<div class="container HideAll" id="Profile">
  <div class="row">

    <div class="col-md-3 ">
      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <div id="uploadImg" style="display: none">
          <h6>Upload a different photo...</h6>
          <input type="file" class="text-center center-block file-upload" >
        </div>
      </div>


    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Your Profile</h4>
                        <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="edit" id="edit" class="btn btn-primary" onclick="EditProfile()">Edit My Profile</button>
                                </div>
                              </div>
                        <hr>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-md-12">
                        <form name="ProfilePage">
                              <div class="form-group row">
                                <label for="firstname" class="col-4 col-form-label">First Name</label>
                                <div class="col-8">
                                  <input id="firstname" name="fname" placeholder="First Name" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                <div class="col-8">
                                  <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="relativeRelation" class="col-4 col-form-label">Relative Relation</label>
                                <div class="col-8">
                                  <input id="relativeRelation" name="relativeRelation" placeholder="Relative Relation" class="form-control here" required="required" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Parentgender" class="col-4 col-form-label">Relative Relation</label>
                                <div class="col-8">
                                  <input id="Parentgender" name="gender" placeholder="Gender" class="form-control here" required="required" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nationalid" class="col-4 col-form-label">National ID</label>
                                <div class="col-8">
                                  <input id="nationalid" name="Nid" placeholder="National ID" class="form-control here" required="required" type="text" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="parentemail" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                  <input id="parentemail" name="email" placeholder="Email" class="form-control here" required="required" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="mobilenumber" class="col-4 col-form-label">Mobile Number</label>
                                <div class="col-8">
                                  <input id="mobilenumber" name="mobile" placeholder="Mobile Number" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Public Info</label>
                                <div class="col-8">
                                  <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control" disabled></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="oldpass" class="col-4 col-form-label"> old Password</label>
                                <div class="col-8">
                                  <input id="oldpass" name="oldpass" placeholder="old Password" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label"> New Password</label>
                                <div class="col-8">
                                  <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>

                            <hr>
                            <h4>Adress Information: </h4>
                            <hr>
                            <div class="form-group row">
                                <label for="city" class="col-4 col-form-label">City</label>
                                <div class="col-8">
                                  <input id="city" name="city" placeholder="Your City" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="neigherhoodName" class="col-4 col-form-label">Neigherhood Name </label>
                                <div class="col-8">
                                  <input id="neigherhoodName" name="neigherhoodName" placeholder="Your Neigherhood Name" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="StreetName" class="col-4 col-form-label">Street Name</label>
                                <div class="col-8">
                                  <input id="StreetName" name="StreetName" placeholder="Street Name" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                            <div class="form-group row">
                                <label for="buildno" class="col-4 col-form-label">Building Number</label>
                                <div class="col-8">
                                  <input id="buildno" name="buildno" placeholder="Building Number" class="form-control here" type="text" required="required" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="update" name="submit" type="submit" class="btn btn-primary" style="display: none">Update My Profile</button>
                                </div>
                              </div>
                            </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div>


<div class="container HideAll" id="ChildProfile" style="display: none">
  <div class="row">
    <div class="col-md-3 ">
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                 <h4>Your Child</h4>
                 <button name="edit" id="edit" class="btn btn-primary" onclick="EditChild()">Edit Profile</button>
                  <button name="add" id="add" class="btn btn-primary" onclick="AddChild()">Add New Child</button>
                        <hr>

                </div>
                <div class="row">

                    <div class="col-md-12">
                        <form name="childform">

                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Child First Name</label>
                                <div class="col-8">
                                  <input id="name" name="fname" placeholder="First Name" class="form-control here" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Child Last Name</label>
                                <div class="col-8">
                                  <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text" disabled>
                                </div>
                              </div>


                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Child Birthdate</label>
                                <div class="col-8">
                                <select id="dobday" disabled></select>
                                <select id="dobmonth" disabled></select>
                                <select id="dobyear" disabled></select>


                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="Category" class="col-4 col-form-label">Category Number</label>
                                <div class="col-8">
                                <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" id="cat" type="button" data-toggle="dropdown" disabled>Category
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                <li><a href="#">C1</a></li>
                                <li><a href="#">C2</a></li>
                                <li><a href="#">C3</a></li>
                                </ul>
                                </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label  class="col-4 col-form-label">Invoice Number</label>
                                <div class="col-8">
                                  <input id="Invoice" name="Invoice" placeholder="Invoice Number" class="form-control here" type="text" disabled>
                                </div>
                              </div>


                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="confirm1" name="confirm" type="submit" class="btn btn-primary" style="display: none" >Confirm </button>
                                </div>
                              </div>
                            </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div>
</div>

<script src="../js/ParentPage.js"></script>
<script src="../js/dobpicker.js"></script>

</body>
</html>
