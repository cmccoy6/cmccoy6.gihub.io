<!DOCTYPE html>

<?php
session_start();

if( isset($_SESSION['user'])!="" ){
   header("Location: index.php");
}
include_once 'connect.php';

if ( isset($_POST['sca']) ) {
    $username = trim($_POST['username']);
    $pass = trim($_POST['pass']);
    $password = hash('sha256', $pass);
    
    $query = "select userid, username, pass from people where username=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if( $count == 1 && $row['pass']==$password ) {
        $_SESSION['user'] = $row['userid'];
        header("Location: profile.php");
    }
    else {
        $message = "Invalid Login";
    }
    $_SESSION['message'] = $message;
}
?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Colin McCoy: Homepage</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/modals.css">
	<script src=""></script>
</head>

<body>

	<p><h1>
	<?php
		if ( isset($message) ) {
			echo $message;
		}
	?>
	</h1></p>

	<div class="background">
	<div class="modal">
	<h3>Login</h3>
	<form action="/login.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for "pass">Password:</label>
		<input type="password" id="pass" name="pass"><br><br>
		<input type="submit" name="sca" class="submit" value="Login">
	</form>
	</div>
	</div>
</body>

</html>
