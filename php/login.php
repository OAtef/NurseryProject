<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="..\css\login.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<h2>Login Form</h2>

<button id = "loginBtn" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
	<?php include('errors.php') ?>
			<div class="input-group">
				<label for="email">email</label>
				<input type="text" placeholder="Enter Username" name="email" required>
			</div>
			<div class="input-group">
				<label for="password">Password</label>
				<input type="password" placeholder="Enter Password" name="password" required>
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
		</form>
    </div>

</div>

<script type="text/javascript" src="..\js\login.js"></script>

</body>
</html>
