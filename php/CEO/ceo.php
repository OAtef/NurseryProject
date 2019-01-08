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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/table.css">
  </head>

  <body>

    <!-- top navigation -->
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
              <li><a href='logout.php'>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <!-- side navigation -->
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      <a href="#" id="vm">View Msg</a>
      <a href="#" id="sm">Send Msg</a>
      <a href="#" id="AE">Add Employee</a>
      <a href="#" id="VE">View Employee </a>
      <!-- <a href="#" id="VP">View Parents </a> -->
    </div>

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

    <?php include('../errors.php');
    if (isset($MessageSentScript)) {
      echo $MessageSentScript;
    }
    ?>

  <div id="main">
    <!-- Add Employee Profile -->
    <div class="container HideAll" id="AddEmployee">
      <form id="EmployeeForm" method="POST">
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <h4>New Employees</h4>
                  <hr>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstname" class="col-4 col-form-label">Employee First Name</label>
                      <div class="col-8">
                        <input id="firstname" name="firstname" placeholder="First Name" class="form-control here" type="text" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lastname" class="col-4 col-form-label">Employee Last Name</label>
                      <div class="col-8">
                        <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-4 col-form-label">Gender: </label>
                        <select id="gender" name="gender" style="display: inline-block" required="required">
                          <option>female</option>
                          <option>male</option>
                        </select>
                    </div>
                    <div class="form-group row">
                      <label for="mobilenumber" class="col-4 col-form-label">Mobile Number</label>
                      <div class="col-8">
                        <input id="mobilenumber" name="mobile" placeholder="Mobile Number" class="form-control here" type="text" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nationalid" class="col-4 col-form-label">National ID</label>
                      <div class="col-8">
                        <input id="nationalid" name="nationalid" placeholder="National ID" class="form-control here" type="text" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="hours" class="col-4 col-form-label">Weekly Working Hours</label>
                      <div class="col-8">
                        <input id="hours" name="hours" placeholder="Working Hours" class="form-control here" type="number" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-4 col-form-label">Email</label>
                      <div class="col-8">
                        <input id="email" name="email" placeholder="Email" class="form-control here" type="text" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-4 col-form-label">Password</label>
                      <div class="col-8">
                        <input id="password" name="password" placeholder="New Password" class="form-control here" type="password" required="required">
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label for="Category" class="col-4 col-form-label">Category</label>
                      <div class="col-8">
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" id="cat" type="button" data-toggle="dropdown">Category
                            <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Teacher</a></li>
                            <li><a href="#">Labor</a></li>
                            <li><a href="#">C3</a></li>
                          </ul>
                        </div>
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <div class="offset-4 col-8">
                        <button id="addEmpbtn" name="addEmpbtn" type="submit" class="btn btn-primary" > Confirm New Employee </button>
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

    <!-- View Employee -->
    <div class="container HideAll" id="ViewEmployee" style="margin-left: 100px; display: none">
        <table class="data-table">
          <thead class="data-table-head">
            <tr>
              <th> </th>
              <th># </th>
              <th>ID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Bdate</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr class="row row1">
              <td> <label id="lblId">1</label></td>
              <td><label id="lblEmp">14</label></td>
              <td><label id="lblName">Seif Elmosalamy </label></td>
              <td><label id="lblGroup">Male</label></td>
              <td><label id="lblMobile">28/11/2017</label></td>
              <td><button><i class="fa fa-edit" onclick="setVisible()"></i> Edit</button></td>
              <td><button><i class="fa fa-trash"></i> Delete</button></td>
            </tr>
            <tr class="extra-data extra-data-row1">
              <td colspan="100%">
                <b>Name: </b> <label style="font-style: italic;" id="lblName">Seif Elmosalamy</label>
                <div id="EditorDivName" style="margin-left: 50%"> Enter a Name: <input type="text" id="emp" value="" /> <input type="button" id="textEditor" value="Change Name" onclick="changeName()" /> </div>
                <hr>
                <b>Bdate: </b> 28-10-2018
                <div id="EditorDivBdate" style="margin-left: 50%"> Enter New Date: <input type="date" id="emp" value="" /> <input type="button" id="textEditor" value="Change Birthday Date" onclick="changeMobile()" /> </div>
                <hr>
                <b>Employee Email: </b> Seifelmosalamy@gmail.com
                <div id="EditorDivEmail" style="margin-left: 50%"> Enter New Email: <input type="text" id="emp" value="" /> <input type="button" id="textEditor" value="Change Email" onclick="changeEmail()" /> </div>
                <hr>
                <b>Invoice ID: </b> Value 4
                <div id="EditorDiv" style="margin-left: 50%"> Edit Invoice ID: <input type="text" id="emp" value="" /> <input type="button" id="textEditor" value="Change Name" onclick="changeName()" /> </div>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>


  <script src="../../js/ceo.js"></script>
  <script src="../../js/table.js"></script>

</body>

</html>
