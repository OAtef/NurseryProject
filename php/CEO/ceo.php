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
  <link rel="stylesheet" type="text/css" href="../../css/Schedule.css">
</head>

<body>

  <?php
  include('../alerts.php');
  ?>

  <!-- top navigation -->
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

  <!-- side navigation -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="#" id="vm">View Msg</a>
    <a href="#" id="sm">Send Msg</a>
    <a href="#" id="AE">Add Employee</a>
    <a href="#" id="VE">View Employee </a>
    <a href="#" id="TT">Time Table </a>
    <!-- <a href="#" id="VP">View Parents </a> -->
  </div>


  <div id="main">

    <!-- Add Employee Profile -->
    <div class="container HideAll" id="AddEmployee" style="margin-left: 200px">
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
                      <button id="addEmpbtn" name="addEmpbtn" type="submit" class="btn btn-primary"> Confirm New Employee </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
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


    <!-- View Employee -->
    <div class="container HideAll" id="ViewEmployee" style="margin-left: 100px; display: none">

    </div>

    <div class="container HideAll" id="TimeTable1" style="margin-left: 250px; display:none; ">
      <form name="saveScheldueForm" id="saveScheldueForm" method="POST">

        <div contenteditable="true" style="margin-top: 100px; margin-left: 100px">
          <H1>Nursery Timetable</H1>
          <TABLE class="myTimetable">
            <THEAD>
              <TR>
                <TH></TH>
                <TH>Monday</TH>
                <TH>Tuesday</TH>
                <TH>Wednesday</TH>
                <TH>Thursday</TH>
                <TH>Friday</TH>
              </TR>
            </THEAD>
            <TBODY>
              <TR>
                <TD>8:00-9:30</TD>
                <TD>
                  <div class="subject"> <input id="subject" name="subject" placeholder="Math" class="form-control here" type="text"></div>
                  <div class="room">A120</div>
                </TD>
                <TD>
                  <div class="subject">Art</div>
                  <div class="room">C1</div>
                </TD>
                <TD>
                  <div class="subject">English</div>
                  <div class="room">B21</div>
                </TD>
                <TD>
                  <div class="subject">Maths</div>
                  <div class="room">A120</div>
                </TD>
                <TD>
                  <div class="subject">Geography</div>
                  <div class="room">B101</div>
                </TD>
              </TR>
              <TR>
                <TD>9:30-11:00</TD>
                <TD>
                  <div class="subject">Science</div>
                  <div class="room">Lab1</div>
                </TD>
                <TD>
                  <div class="subject">History</div>
                  <div class="room">B104</div>
                </TD>
                <TD>
                  <div class="subject">Spanish</div>
                  <div class="room">C17</div>
                </TD>
                <TD>
                  <div class="subject">P.E.</div>
                  <div class="room">A Gym</div>
                </TD>
                <TD>
                  <div class="subject">Maths</div>
                  <div class="room">A120</div>
                </TD>
              </TR>
              <TR>
                <TD colspan="6" class="break">Break</TD>
              </TR>
              <TR>
                <TD>11:30-1:00</TD>
                <TD>
                  <div class="subject">I.T.</div>
                  <div class="room">ICT 1</div>
                </TD>
                <TD>
                  <div class="subject">English</div>
                  <div class="room">B21</div>
                </TD>
                <TD>
                  <div class="subject">Musique</div>
                  <div class="room">C5</div>
                </TD>
                <TD>
                  <div class="subject">English</div>
                  <div class="room">B21</div>
                </TD>
                <TD>
                  <div class="subject">PSHE</div>
                  <div class="room">A24</div>
                </TD>
              </TR>
              <TR>
                <TD colspan="6" class="lunch">Lunch</TD>
              </TR>
              <TR>
                <TD>1:30-3:00</TD>
                <TD>
                  <div class="subject">History</div>
                  <div class="room">B104</div>
                </TD>
                <TD>
                  <div class="subject">Drama</div>
                  <div class="room">C17</div>
                </TD>
                <TD>
                  <div class="subject">Maths</div>
                  <div class="room">A120</div>
                </TD>
                <TD>
                  <div class="subject">Geography</div>
                  <div class="room">B101</div>
                </TD>
                <TD>
                  <div class="subject">P.E.</div>
                  <div class="room">A Gym</div>
                </TD>
              </TR>
              <TR>
                <TD>3:00-4:30</TD>
                <TD>
                  <div class="subject">Spanish</div>
                  <div class="room">C17</div>
                </TD>
                <TD>
                  <div class="subject">Science</div>
                  <div class="room">Lab1</div>
                </TD>
                <TD>
                  <div class="subject">English</div>
                  <div class="room">B21</div>
                </TD>
                <TD>
                  <div class="subject">Science</div>
                  <div class="room">Lab1</div>
                </TD>
                <TD>
                  <div class="subject">R.E</div>
                  <div class="room">B18</div>
                </TD>
              </TR>
            </TBODY>
          </TABLE>

        </div>
        <input type="button" name="saveSchedule" value="Save" id="saveSchedule">

      </form>
    </div>

  </div>


  <script src="../../js/ceo.js"></script>

</body>

</html>
