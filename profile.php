<?php
ob_start();
session_start();
require_once 'connect.php';
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit;
}

$query = "SELECT * FROM people WHERE userid=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user']]);
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>

<head>

<title>Colin McCoy: Profile Page</title>
<link rel="stylesheet" type="text/css" href="styles/profile.css">
</head>

<body>

<div class="header">
<ul>
<li><img src="img/logo.png" id="logo" alt="SportsFeed logo"></li>
<li><h2><?php echo $userRow['fname']; ?>'s SportsFeed</h2></li>
<li><a href="logout.php">Home</a>
<?php
	if($userRow['role'] == "administrator") {
		echo "<li><a href='admin.php'>Admin</a></li>";
	}
?>
<li><a href="logout.php">Logout Here</a></li>
<ul>
</div>

<div class="container">
<div class="scorecard">
<h3 id="title">My Scoreboard</h3>
<p>Customize your favorites to get your personalized scoreboard</p>
</div>

<div class="card-container">
<div class="card">
<h4>My Sports</h4>
<img src="img/sports.png" class="icon" alt="sports icon">
<a href="comming-soon.html">Add more sports +</a>
</div>

<div class="card">
<h4>My Leagues</h4>
<img src="img/leagues.png" class="icon" alt="Leagues Icon">
<a href="comming-soon.html">Add more leagues +</a> 
</div>

<div class="card">
<h4>My Teams</h4>
<img src="img/teams.png" class="icon" alt="Teams Icon">
<a href="comming-soon.html">Add more teams +</a>
</div>

<div class="card">
<h4>My Players</h4>
<img src="img/players.png" class="icon" alt="Players Icon">
<a href="comming-soon.html">Add more players +</a>
</div>
</div>
</div>

</body>
</html>
<?php ob_end_flush(); ?>
