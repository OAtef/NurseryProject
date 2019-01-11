<?php
  include('../SendMsg.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="../../js/sweetalert2/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../../css/parent.css">
    </head>
  <body>

    <?php
    include('../alerts.php');
    ?>

  <!-- Upper Nav-bar-->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span></a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../../welcomePage.php">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a id="Pic-btn"><span class=""></span> Pic</a></li>
          <li class='dropdown'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Name
            <span class='caret'></span></a>
            <ul class='dropdown-menu'>
              <li><a href='../logout.php'>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

  <!-- Side Nav-bar-->
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#s"  id="pf">Profile</a>
      <a href="#"  id="vm">View Msg</a>
      <a href="#"  id="sm">Send Msg</a>
      <a href="#"  id="ch">Child</a>
    </div>

  <div id="main">
    <!-- View Msg Panel -->
    <div class="container HideAll" id="Vmsg" style="display: none">

  </div>

    <!-- Send Msg Panel -->
  <div class="container HideAll" id="Smsg" style="display: none">
    <div class="row">
      <div class="col-md-6 col-md-offset-3" id="form_container">
        <h2>Contact Us</h2>
        <p> Please send your message below. We will get back to you at the earliest! </p>
        <form role="form" method="POST" id="reused_form">
          <div class="row">
            <div class="col-sm-12 form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 form-group">
              <label for="message">Message:</label>
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



    <!-- Parent Profile -->
    <div class="container HideAll" id="Profile">
      <form id="ProfilePage" method="POST" enctype="multipart/form-data" name="ProfilePage">
      <div class="row">
        <div class="col-md-3 ">
          <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" id="ParentImgContainer">
            <div id="uploadImg" style="display: none">
              <h6>Upload a different photo...</h6>
              <input type="file" class="text-center center-block file-upload" name="imageParent" id="imageParent">
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
                      <button name="edit" id="edit" class="btn btn-primary">Edit My Profile</button>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
              <div class="row" >
              <div id="errormsg"></div>
                <div class="col-md-12">
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
                        <label for="genderr" class="col-4 col-form-label">Gender: </label>
                        <select id="genderr" name="genderr" required="required" style="display: inline-block" disabled>
                          <option>female</option>
                          <option>male</option>
                        </select>
                    </div>
                    <div class="form-group row">
                      <label for="relativeRelation" class="col-4 col-form-label">Relative Relation</label>
                      <div class="col-8">
                        <input id="relativeRelation" name="relativeRelation" placeholder="Relative Relation" class="form-control here" type="text" required="required"  disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nationalid" class="col-4 col-form-label">National ID</label>
                      <div class="col-8">
                        <input id="nationalid" name="Nid" placeholder="National ID" class="form-control here" type="text" required="required" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="parentemail" class="col-4 col-form-label">Email</label>
                      <div class="col-8">
                        <input id="parentemail" name="email" placeholder="Email" class="form-control here" type="text" required="required" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="mobilenumber" class="col-4 col-form-label">Mobile Number</label>
                      <div class="col-8">
                        <input id="mobilenumber" name="mobile" placeholder="Mobile Number" class="form-control here" type="text" required="required" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="oldpass" class="col-4 col-form-label"> old Password</label>
                      <div class="col-8">
                        <input id="oldpass" name="oldpass" placeholder="old Password" class="form-control here" type="password" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="newpass" class="col-4 col-form-label"> New Password</label>
                      <div class="col-8">
                        <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="password" disabled>
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
                        <button type="submit" id="update" name="update" class="btn btn-primary" style="display: none">Update My Profile</button>
                      </div>
                    </div>
                  </div>
               </div>
              </div>
            </div>
         </div>
        </div>
      </form>
    </div>

      <!-- Child Profile -->
      <div class="container HideAll" id="ChildProfile" style="display: none">
        <form id="childform" method="POST" enctype="multipart/form-data" name="childform">
        <div class="col-md-3 ">
          <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" id="ChildImgContainer">
            <div id="uploadImgChild" style="display: none">
              <h6>Upload a different photo...</h6>
              <input type="file" class="text-center center-block file-upload" name="image" id="image" >
            </div>
          </div>
        </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="form-group">
                    <div class="col-8">
                        <label for="childrenList" class="col-4 col-form-label">Your Children</label>
                        <select id="childrenList"></select>
                        <br>
                        <button name="editChild" id="editChild" class="btn btn-primary"> Show Child Profile</button>
                        <button name="addChild" id="addChild" class="btn btn-primary" onclick="AddChild()"> Add New Child</button>
                        <hr>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div id="hide-child-info">
                      <div id="hide-rejected">
                        <div class="form-group row">
                          <label for="child_fname" class="col-4 col-form-label">Child First Name</label>
                          <div class="col-8">
                            <input id="child_fname" name="child_fname" placeholder="First Name" class="form-control here" type="text" required="required" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="child_lname" class="col-4 col-form-label">Child Last Name</label>
                          <div class="col-8">
                            <input id="child_lname" name="child_lname" placeholder="Last Name" class="form-control here" type="text" required="required" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="text" class="col-4 col-form-label">Child Birthdate</label>
                          <div class="col-8">
                            <input id="child_bdate" name="child_bdate" class="form-control here" type="date" required="required" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="gender" class="col-4 col-form-label">Gender: </label>
                          <select id="gender" name="gender" required="required" style="display: inline-block" disabled>
                            <option>female</option>
                            <option>male</option>
                          </select>
                        </div>
                      </div>
                      <div id="interview" class="form-group row" style="display: none">
                        <label for="interviewDate" class="col-4 col-form-label">Interview Date</label>
                        <div class="col-8">
                          <input id="interview_Date" name="interview_Date" class="form-control here" type="date" disabled>
                        </div>
                      </div>
                      <div id="interview_state" class="form-group row" style="display: none">
                        <label for="interState" class="col-4 col-form-label">Interview State</label>
                        <div class="col-8">
                          <input id="interState" name="interState" class="form-control here" type="text" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button type="submit" id="addNewChild" name="addNewChild" class="btn btn-primary" style="display: none"> Confirm </button>
                          <button id="interviewbtn" name="interviewbtn" class="btn btn-primary" style="display: none"> Print Interview Paper </button>
                        </div>
                      </div>
                      <div class="form-group row">
                          <button type="submit" id="changeChildData" name="changeChildData" class="btn btn-primary" style="display: none"> Confirm Change </button>
                          <button id="intakebtn" name="intakebtn" class="btn btn-primary" style="display: none"> Print Intake Report </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

  <script src="../../js/parent.js"></script>

  </body>
</html>
