<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
  	header('location: login.php');
  }
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['email'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
    	<p> <a href="login.php" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>