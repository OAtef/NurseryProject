<?php
include('php/server.php');
?>
<html lang="en">
	<head>
		<title>Nursery</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- style -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/welcomepage.css">
		<link rel="stylesheet" type="text/css" href="css/modal.css">
		<!-- Javascript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/sweetalert2/sweetalert2.all.min.js"></script>

	</head>
	<body>

		<!-- Navbar -->
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"></button>
			  <a class="navbar-brand" href="#"><img src="/img/logo.jpg" style="max-width: 40px; max-height: 40px;"></a>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar">

				<?php if (isset($_SESSION['success']))	{ ?>
					<ul class='nav navbar-nav'>
						<li class='dropdown'>
							<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Get in touch
								<span class='caret'></span></a>
								<ul class='dropdown-menu'>
									<li><a href='#'>Book a Visit</a></li>
									<li><a href='#'>Email Us</a></li>
								</ul>
						</li>
						<li><a href='#'>About Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
									if (isset($_SESSION['userType']) && $_SESSION['userType'] == 1) {
										echo "<li><a href='php/parent.php' class='glyphicon glyphicon-user'> UserName</a></li>";
									}
									elseif (isset($_SESSION['userType']) && $_SESSION['userType'] == 2) {
										echo "<li><a href='php/Manager.php' class='glyphicon glyphicon-user'> UserName</a></li>";
									}
									elseif (isset($_SESSION['userType']) && $_SESSION['userType'] == 3) {
										echo "<li><a href='php/CEO.php' class='glyphicon glyphicon-user'> UserName</a></li>";
									}
						?>
					 <li><a href='php/logout.php' class="glyphicon glyphicon-log-out"> Logout</a></li>
				 </ul>

				 <?php } else {?>
					 <ul class='nav navbar-nav'>
						 <li class='dropdown'>
							 <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Get in touch
								 <span class='caret'></span></a>
								 <ul class='dropdown-menu'>
									 <li><a href='#'>Book a Visit</a></li>
									 <li><a href='#'>Email Us</a></li>
								 </ul>
						 </li>
						 <li><a href='#'>About Us</a></li>
					 </ul>
					 <ul class="nav navbar-nav navbar-right">
						 <li><a id="loginBtn"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						 <li><a id="signupBtn"><span class="glyphicon glyphicon-log-in"></span> Signup</a></li>
					 </ul>
				 <?php } ?>
			</div>
		  </div>
		</nav>

		<div id="id01" class="modal">

			<form class="modal-content animate" method="post">
				<div class="imgcontainer">
					<span id="closebtn1" class="close" title="Close Modal">&times;</span>
				</div>
				<div class="container">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>Email:</b></span>
						</div>
						<input type="email" placeholder="Enter Email" name="email" required>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>Password:</b></span>
						</div>
						<input type="password" placeholder="Enter Password" name="password" required>
					</div>
					<input class="btn btn-primary" type="submit" value="Login" name="login_user">
					<!-- <button class="btn btn-primary" name="login_user">Login</button> -->
				</div>
			</form>
		</div>

		<?php include('php/errors.php');
					if (isset($logedInScript)) {
						echo $logedInScript;
					}
		?>


		<div id="id02" class="modal">

			<form class="modal-content animate" method="post">
				<div class="imgcontainer">
					<span id="closebtn2" class="close" title="Close Modal">&times;</span>
				</div>
				<div class="container">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>First Name:</b></span>
						</div>
						<input type="text" placeholder="Enter First Name" name="firstname" required>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>Last Name:</b></span>
						</div>
						<input type="text" placeholder="Enter Last Name" name="lastname"required>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>Mobile Number:</b></span>
						</div>
						<input type="text" placeholder="Enter Mobile Number" name="mobileNumber"required>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>Email:</b></span>
						</div>
						<input type="email" placeholder="Enter Email" name="email"required>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>Password:</b></span>
						</div>
						<input id="password" type="password" placeholder="Enter Password" name="password1"required>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>Repeat Password:</b></span>
						</div>
						<input id="confirmPassword" type="password" placeholder="Re-enter Password" name="password2"required>
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><b>National ID:</b></span>
						</div>
						<input type="text" placeholder="Enter National ID" name="nationalID"required>
					</div>
					<input class="btn btn-primary" type="submit" value="Signup" name="signup_user">
				</div>
			</form>
		</div>

		<?php include('php/errors.php');
					if (isset($signUpScript)) {
						echo $signUpScript;
					}
		?>

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
			  <div class="item active">
				<img src="img\alwan.jpg" alt="Image" style="width:100%;height:470px">
				<div class="carousel-caption">
				  <h3>Colorful</h3>
				  <p>Learn Drawing.</p>
				</div>
			  </div>

			  <div class="item">
				<img src="img\mosakaf.jpg" alt="Image" style="width:100%;height:470px">
				<div class="carousel-caption">
				  <h3>Be A Nerd</h3>
				  <p>Educate well</p>
				</div>
			  </div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>


		<div id="section1" class="tab">
			<button class="tablinks" id="btn1" onclick="openCity(event, 'section21')">Nutrition</button>
			<button class="tablinks" id="btn2" onclick="openCity(event, 'section22')">Activites</button>
		</div>

		<div id="section21" class="container-fluid tabcontent">
			<div class="container text-center">
				<h3>NUTRITION</h3>
				<p><em>"We Care"</em></p>
				<p>Our excellent nutritionally balanced menu is changed regularly to encourage a varied diet and is approved by Action for Children.
				Here is an example of a typical menu.</p>
				<br>
				<div class="row">
					<div class="col-sm-4">
					  <p class="text-center"><strong>Breakfast</strong></p><br>
					  <a href="#demo" data-toggle="collapse">
						<img src="img\breakfast.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
					  </a>
					  <div id="demo" class="collapse">
						<p>Low Sugar / Wholewheat Cereals with Milk Porridge</p>
						<p>Wholemeal Bread/Toast/English Muffins Seasonal Fresh Fruit</p>
						<p>Whole Milk or Water</p>
					  </div>
					</div>
					<div class="col-sm-4">
						<p class="text-center" ><strong>Lunch</strong></p><br>
						<a href="#demo2" data-toggle="collapse">
						<img src="img\Lunch.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
						</a>
						<div id="demo2" class="collapse">
							<ul style="list-style-type:none">
								<li>Vegetarian Moussaka with Garlic Bread</li>
								<li>Homemade Ocean Fish Pie with Mixed Vegetables</li>
								<li>Winter Vegetable Pie with Broccoli </li>
								<li>Beef,Vegetable &amp; Bean Casserole with Couscous</li>
								<li>Roast Quorn with Yorkshire Pudding  Seasonal Vegetables and Vegetarian Gravy</li>
								<li>Apple &amp; Chicken Curry with Rice</li>
								<li>Lentil Curry &amp; Rice</li>
								<li>Rosemary Lamb &amp; Vegetable Hot Pot</li>
								<li>Quorn Hot Pot with Winter Vegetables</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
					<p class="text-center"><strong>Dinner</strong></p><br>
					<a href="#demo3" data-toggle="collapse">
					<img src="img\Dinner.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
					</a>
					<div id="demo3" class="collapse">
						<ul style="list-style-type:none">
							<li>Chicken or Quorn Ratatouille &amp; Couscous</li>
							<li>Winter Fruit Smoothie</li>
							<li>Salmon &amp; Chive Filled Potato Boats</li>
							<li>Apricot Biscuits</li>
							<li>Chicken or Quorn Ratatouille &amp; Couscous</li>
							<li>Fruit Shortbread</li>
							<li>Salmon &amp; Chive Filled Potato Boats</li>
							<li>Mandarin Sponge Fingers </li>
							<li>Chicken or Quorn Ratatouille &amp; Couscous</li>
							<li>Melon  Pots</li>
						</ul>
				  </div>
				</div>
				</div>
			</div>
		</div>

		<div id="section22" class="container-fluid tabcontent">
			<div class="container text-center">
				<h3>ACTIVITES</h3>
				<p><em>"We Care"</em></p>
				<p>Child may also describe a relationship with a parent (such as sons and daughters of any age)[3] or, metaphorically, an authority figure, or signify group membership in a clan, tribe, or religion; it can also signify being strongly affected by a specific time, place, or circumstance, as in "a child of nature" or "a child of the Sixties"</p>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center"><strong>Breakfast</strong></p><br>
						<a href="#demo" data-toggle="collapse">
						<img src="img\breakfast.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
						</a>
						<div id="demo" class="collapse">
						<p>Low Sugar / Wholewheat Cereals with Milk Porridge</p>
						<p>Wholemeal Bread/Toast/English Muffins Seasonal Fresh Fruit</p>
						<p>Whole Milk or Water</p>
						</div>
					</div>
					<div class="col-sm-4">
						<p class="text-center" ><strong>Lunch</strong></p><br>
						<a href="#demo2" data-toggle="collapse">
						<img src="img\Lunch.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
						</a>
						<div id="demo2" class="collapse">
							<ul style="list-style-type:none">
								<li>Vegetarian Moussaka with Garlic Bread</li>
								<li>Homemade Ocean Fish Pie with Mixed Vegetables</li>
								<li>Winter Vegetable Pie with Broccoli </li>
								<li>Beef,Vegetable &amp; Bean Casserole with Couscous</li>
								<li>Roast Quorn with Yorkshire Pudding  Seasonal Vegetables and Vegetarian Gravy</li>
								<li>Apple &amp; Chicken Curry with Rice</li>
								<li>Lentil Curry &amp; Rice</li>
								<li>Rosemary Lamb &amp; Vegetable Hot Pot</li>
								<li>Quorn Hot Pot with Winter Vegetables</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
					<p class="text-center"><strong>Dinner</strong></p><br>
					<a href="#demo3" data-toggle="collapse">
					<img src="img\Dinner.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
					</a>
					<div id="demo3" class="collapse">
						<ul style="list-style-type:none">
							<li>Chicken or Quorn Ratatouille &amp; Couscous</li>
							<li>Winter Fruit Smoothie</li>
							<li>Salmon &amp; Chive Filled Potato Boats</li>
							<li>Apricot Biscuits</li>
							<li>Chicken or Quorn Ratatouille &amp; Couscous</li>
							<li>Fruit Shortbread</li>
							<li>Salmon &amp; Chive Filled Potato Boats</li>
							<li>Mandarin Sponge Fingers </li>
							<li>Chicken or Quorn Ratatouille &amp; Couscous</li>
							<li>Melon  Pots</li>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>

		<div id="section3" class="container-fluid"></div>

		<div id="section42" class="container-fluid">
			<div class="row" align="center">
				<div class="col-sm-2"></div>
				<div class="col-sm-3">
					<p class="text-center" ><strong>DROP OFF</strong></p><br>
					<div class="flip-card">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="img\children.jpg" alt="Avatar" style="width:300px;height:300px;">
							</div>
							<div class="flip-card-back">
							  <h1>Drop off</h1>
							  <p>Pick up/ Drop off time. You will see that the pick up and drop off time are well noted in each of the cruise itinerary.
								Generally speaking, most cruise trip will start at noontime, thus if you are leaving from Hanoi, you will need to depart
								between 8:00 and 8:30AM to meet the cruise schedule.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<p class="text-center" ><strong>ACTIVITY TIME</strong></p><br>
					<div class="flip-card">
					  <div class="flip-card-inner">
						<div class="flip-card-front">
						  <img src="img\jumping.jpg" alt="Avatar" style="width:300px;height:300px;">
						</div>
						<div class="flip-card-back">
						  <h1>Activity Time</h1>

						  <p> Get students of all ages excited about learning with these interactive activities that span multiple grades and
						  subjects. From science experiments and educational games that get kids moving and laughing to arts and crafts projects
						  that allow for creativity and relaxation, your child will develop a sense of wonder and exploration while getting essential
						  skills practice in everything from math and science to reading and emotional intelligence. </p>

						</div>
					  </div>
					</div>
				</div>
				<div class="col-sm-2">
					<p class="text-center" ><strong>STUDYING</strong></p><br>
					<div class="flip-card">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="img\writing.jpg" alt="Avatar" style="width:300px;height:300px;">
							</div>
							<div class="flip-card-back">
							<h1>Morning</h1>
							<p>The Wake Up and Work Circuit Are you ever tired of doing the same thing day in and day out? Your students may be too,
							that’s why some classroom teachers are now starting their day with the wake-up and-work circuit. The idea behind this
							activity is that each morning, students come school and start their day doing something different than the day before.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container text-center">
		  <h2>A Place to Grow</h2><br>
		  <div class="row">
			<div class="col-sm-1" style="width: 200px height:300px"> </div>
			<div class="col-sm-4">
					<p>MIU children's pre-school day nursery is based in a large converted house in the centre of MIU. </p>

					<p><span style="font-weight: lighter;">Each specially designed, age appropriate room is filled with natural resources and
						state-of-the-art equipment to support the education, care and development of children in the early years.Our stunning
						adventure garden allows free-flow play all year round and includes a climbing frame,
						race track, water feature and soft surface for exploring the outdoors.</span></p>

					<p><span style="font-weight: lighter;">We hold a 5* EHO rating for food safety and hygiene. Our delicious, healthy and nutritious food,
						sourced from trusted suppliers is prepared and cooked by our very own chef catering for all dietary and religious needs
						with kosher food available on request.&nbsp;</span></p>

					<p><span style="font-weight: lighter;">We will be delighted to welcome you to MIU pre-school &amp; day nursery. Our friendly,
					experienced and highly qualified staff are on hand to conduct a personal nursery tour at a time to suit you.</span></p>

					<p><i style="font-size:54px" class="fa">&#xf2bc;</i>
						<strong>FullName</strong><br>
						Nursery Manager
					</p>

					<p> Name achieved a BaHons Degree in Primary Education with Qualified Teacher Status and has worked in childcare for over 20 years.
					Name joined MIU in November 1999.<br></p>
			</div>
			<div class="col-sm-2" style="width: 100px height:300px"> </div>
			<div class="col-sm-4">
				<div class="well">
					<iframe class="map-card__map" style="border: 0px; width: 300px; height: 270px;" marginheight="0" marginwidth="0"
					src="https://maps.google.com/maps?q=30.169990, 31.491635&hl=es;z=14&amp;output=embed"></iframe><br>
					<br>
					<hr>

					<p>Esmailiya Desert Road
					<br>Cairo
					<br>Egypt</p>

					<br><br>
					<table align="center" width="200px">
						<tbody >
							<tr align="left">
								<td>Monday</td>
								<td >07:30-18:30</td>
							</tr>

							<tr align="left">
								<td>Tuesday</td>
								<td>07:30-18:30</td>
							</tr>

							<tr align="left">
								<td>Wednesday</td>
								<td>07:30-18:30</td>
							</tr>

							<tr align="left">
								<td>Thursday</td>
								<td>07:30-18:30</td>
							</tr>

							<tr align="left">
								<td>Friday</td>
								<td>07:30-18:30</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-4"></div>
		  </div>
		</div>

		<br>

		<div class="col-sm-12" style="background-color:DodgerBlue; width:1289px">
			<div class="col-sm-8" >
				<h2 style="color: white; text-align:center; font-size:60px " >Fees &amp; <br>Availability</h2>
				<p style="text-align:center;color: white;font-size:30px  ">Where possible we look to offer flexible booking patterns and
				a range of funding options,including the government's 30 hours funded childcare* provision.</p>
			</div>
			<div class="col-sm-2">
				<img src="img\nursery-images-9.jpg" alt="" width="480" height="350" />
			</div>
		</div>

		<!-- Footer -->
		<footer class="container-fluid text-center" >
			<div class="col-sm-4">
				<div class="col-sm-6">
					<h4><span>More From</span> MIU  Pre-School &amp; Day Nursery</h4>
					<ul>
						<li><a href="" target="" style="color:white">Careers at MIU  Pre-School &amp; Day Nursery</a></li>
					</ul>
				</div>
				<div class="col-sm-6" >
					<h4><span>More From</span> MIU Nursery</h4>
					<ul style="color:white">
						<li><a href="" target="" style="color:white">Careers at MIU Nursery</a></li>
						<li><a href="" style="color:white">Parent Portal</a></li>
					</ul>
				</div>

			</div>

			<div class="col-sm-8">
				<ul class="col-sm-4" style="color:white">
					<li class="social-links__item social-links__item--fb"><a href="https://www.facebook.com" ><i class="fa fa-facebook"></i></a></li>
					<li class="social-links__item social-links__item--tw"><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
					<li class="social-links__item social-links__item--yt"><a href="https://www.youtube.com"><i class="fa fa-youtube"></i></a></li>
					<li class="social-links__item social-links__item--inst"><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
				</ul>
				<ul class="col-sm-4" >
						<li><a href="" style="color:white" >Home</a></li>
						<li><a href="" style="color:white">our-nursery</a></li>
						<li><a href="" style="color:white">miu--preschool-and-day-nursery</a></li>
				</ul>
			</div>
		</footer>
		<script type="text/javascript" src="js\login.js"></script>
		<script type="text/javascript" src="js\welcomepage.js"></script>
	</body>
</html>
