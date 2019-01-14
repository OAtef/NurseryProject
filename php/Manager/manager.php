<?php
session_start();
?>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/parent.css">
  <script src="../../js/sweetalert2/sweetalert2.all.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/table.css">


</head>

<body>

  <?php
  // include('../alerts.php');
  ?>

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
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <?php echo $_SESSION['Name']; ?>
            <span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='../logout.php'>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#" id="pf" class="buttom">Profile (nurse info)</a>
    <a href="#" id="vm">View Msg</a>
    <a href="#" id="sm">Send Msg</a>
    <a href="#" id="VNI">New Interviews </a>
    <a href="#" id="VI">View Interviews </a>
    <a href="#" id="VP">View Parents </a>
    <a href="#" id="CL">Children List </a>
  </div>

  <div id="main">

    <!-- Profile -->
    <div class="container HideAll" id="Profile">
      <form name="ProfilePage">

        will add nusrse info later

      </form>
    </div>

    <!-- View Msg -->
    <div class="container HideAll" id="Vmsg" style="display: none">

    </div>

    <!-- Send Msg -->
    <div class="container HideAll" id="Smsg" style="display: none">
      <div class="row">
        <div class="col-md-6 col-md-offset-3" id="form_container">
          <h2>Send Message</h2>
          <p>Please send your message below.</p>
          <form role="form" method="post" id="reused_form">
            <div class="row">
              <div class="col-sm-12 form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="SendingEmail" name="email" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-lg btn-default pull-right" name="Send_Msg" id="Send_Msg">Send &rarr;</button>
            </div>
          </div>
          <div id="SmsgResults">
          </div>
        </div>
      </div>
    </div>

    <!-- View New Interviews -->
    <div class="container HideAll" id="ViewNewInterview" style="margin-left: 100px; display: none">

    </div>

    <!-- View Interviews -->
    <div class="container HideAll" id="ViewInterview" style="margin-left: 100px; display: none">

    </div>

    <!-- View Parents -->
    <div class="container HideAll" id="ViewParents" style="margin-left: 100px; display: none">

    </div>

    <!-- Children List -->
    <div class="container HideAll" id="ChildrenList" style="margin-left: 100px; display: none">

    </div>

  </div>

  <script src="../../js/manager.js"></script>

</body>

</html>
