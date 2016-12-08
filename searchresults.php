<?php

session_start();

if (!isset( $_POST['submit'] ) ) {
	include "connection.php";
	$sqlsongs = "SELECT * FROM songdetails WHERE flag='1' AND (songname LIKE '%" . $_GET["search"] ."%' OR genre LIKE '%" . $_GET["search"] ."%')";
	$result=$db->query($sqlsongs);
	 // die($sqlsongs);

	$sqlartists = "SELECT * FROM users WHERE customer_name LIKE '%" . $_GET["search"] ."%' OR customer_name LIKE '%" . $_GET["search"] ."%'"	;
	$resultart=$db->query($sqlartists);

	// if(isset($_POST["follow"])) {


	// 	$sqlfoll="UPDATE followers SET currentuser='" . $_SESSION["name"] . "' AND following='".$row["uname"]."'";
	// 		echo ($sqlfoll);

	// }
}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="base.css">
	<style type="text/css">
		.songs,.artists{text-align: center; margin-bottom: 10px; font-weight: bold; font-size: 2em;}
		button{color:black;}
	</style>

	<title>Search Results</title>
</head>
<body>
	<div class="container">

		<div class="page-header">
			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/logout.php" class="btn btn-primary">Logout</a>

				</div>
			</div>

			<h1>Search results of "<?php echo $_GET["search"]  ?>"</h1>
		</div>

		<div class="songs">
			<?php
			if ($result->num_rows > 0) {
    // output data of each row
				while($row = $result->fetch_assoc()) {

					if ($row["download"]=="no"){

						echo "songname: " . $row["songname"]. " - artist: " . $row["songowner"]. "<br>";

						echo "<audio controls>
						<source src=\"./uploads/{$row["songname"]}\" type=\"audio/mp3\">
							Your browser does not support the audio element.
						</audio>"."<br>";
					}
					else{
						echo "songname: " . $row["songname"]. " - artist: " . $row["songowner"]. "<br>";
						echo "<a href=\"../../project/uploads/".$row["songname"]."\">Click here to download song</a><br>";
						echo "<audio controls>
						<source src=\"./uploads/{$row["songname"]}\" type=\"audio/mp3\">
							Your browser does not support the audio element.
						</audio>"."<br>";

					}
				}
			}
			else {
				echo "0 songs found <br>";
			}  ?>
		</div>
		<div class="artists">
			<?php if ($resultart->num_rows > 0) {
    // output data of each row
				while($row = $resultart->fetch_assoc()) {

					echo "Artist: " . $row["customer_name"]. " - Username: " . $row["uname"].
					" <form action=\"../../project/follow.php\" method=\"POST\">
					<button type=\"submit\" name=\"follow\" class=\"btn btn-default\">Follow</button>
				</form> ". "<br>";
			}
		}
		else {
			echo "0 artists found<br>";
		} ?>
	</div>

	<!-- <a href="../../project/."<?php echo $row[customer_name] ?>.>Follow</a> -->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</body>
</html>