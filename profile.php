<?php

session_start();

if (!$_SESSION['is_login']) {
		# code...
	header('Location: index.php');
}

include "connection.php";
$getfollow = "SELECT following FROM followers WHERE currentuser ='" . $_SESSION['uname'] ."'";
$result=$db->query($getfollow);



$countfollowers = "SELECT COUNT(currentuser) AS test1 FROM followers WHERE following = '" . $_SESSION['uname'] ."' GROUP BY following";
$resultfollowers=$db->query($countfollowers);
$row1=$resultfollowers->fetch_assoc();
$foll1= $row1["test1"];


$countfollowed = "SELECT COUNT(following) AS test2 FROM followers WHERE currentuser = '" . $_SESSION['uname'] ."' GROUP BY currentuser";
$resultfollowed=$db->query($countfollowed);
$row2=$resultfollowed->fetch_assoc();
$foll2= $row2["test2"];


while ($row=$result->fetch_assoc()) {
	$getsongs = "SELECT * FROM songdetails WHERE flag = '1' AND songowner ='" . $row["following"] . "'";
	$res=$db->query($getsongs);
}
?>
<html>
<head>
	<title>My Profile</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="base.css">
	<style type="text/css">
		.songs{text-align: center; margin-bottom: 10px;}
	</style>

</head>
<body>
	<div class="container">


		<div class="page-header">

			<div class="col-sm-3 col-md-3 pull-right">
				<form class="navbar-form" role="search" action="../../project/searchresults.php" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="search" id="search" required>
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit" name="submit	"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</form>
			</div>

			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/logout.php" class="btn btn-primary">Logout</a>

				</div>
			</div>
			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/upload.php" class="btn btn-primary">Upload</a>

				</div>
			</div>
			<h1><?php echo "Welcome ". $_SESSION['uname']. "!"; ?></h1>
		</div>


		<div class="myfollowers" style="display: inline-block;">
			Followers: <?php echo $foll1; ?>
		</div>
		<div class="myfollowing" style="display: inline-block;">
			Following: <?php echo $foll2; ?>
		</div>

		<div class="songs">
			<?php
			while ($row=$res->fetch_assoc()) {
				echo "<p style=\"margin-top: 50px; margin-bottom: 0px;\">".$row["songname"]."</p> <br>";

				echo "<audio controls>
				<source src=\"./uploads/{$row["songname"]}\" type=\"audio/mp3\">
					Your browser does not support the audio element.
				</audio>"."<br>";
			}  ?>
		</div>



	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</body>
</html>