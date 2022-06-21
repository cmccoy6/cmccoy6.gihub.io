<!DOCTYPE html>

<?php
session_start();

if( isset($_SESSION['user'])!="" ){
header("Location: profile.php");
}

include_once 'connect.php';

if ( isset($_POST['sca']) ) {
  $username = trim($_POST['username']);
  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);
  $pass = trim($_POST['pass']);
  $password = hash('sha256', $pass);

  $query = "insert into people(username,fname,lname,pass) values(?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$username,$fname,$lname,$password]);
  $rowsAdded = $stmt->rowCount();

  if ($rowsAdded == 1) {
    $message = "Success! Proceed to login";
    unset($fname);
    unset($lname);
    unset($pass);
    header("Location: login.php");
  }
  else
  {
    $message = "Failed! For some reason";
  }
}
?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Colin McCoy: Registration Page</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/modals.css">
	<script src="scripts/validate.js" type="text/javascript"></script>
</head>

<body>
	<div class="background modal-background">
	<div class="modal">
	<h3>Sign Up</h3>
	<form action="register.php" method="post" name="accountcreate" onsubmit="return Validate()">
		<label for="fname">First Name:</label>
		<input type="text" id="fname" name="fname"><br><br>
		<label for "lname">Last Name:</label>
		<input type="text" id="lname" name="lname"><br><br>
		<label for "username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="pass">Password:</label>
		<input type="password" id="pass" name="pass"><br><br>
		<input type="submit" name="sca" class="submit" value="Sign Up">
	</form>
	</div>
	</div>
</body>

</html>
