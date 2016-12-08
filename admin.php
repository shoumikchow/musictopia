<?php
session_start();
if (!$_SESSION['uname']=="admin") {
		# code...
	header('Location: index.php');
}
include "connection.php";


$sql = "SELECT * FROM songdetails WHERE flag='0'";
//echo $sql;
$result=$db->query($sql);

//while ($row=$result->fetch_assoc()) {
//	echo $row["songname"]. " flag: " .$row["flag"];
//}
if(!isset($_POST["submit"])) {

	$upd = "UPDATE songdetails SET flag='1' where id='".$_POST["id"]."'";
	//die($upd);
	$res=$db->query($upd);
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
		th{color:black;}
		input[type="number"]{color:black; font-weight: bold;}

	</style>
	<title>Admin</title>
</head>
<body>
	<div class="container">

		<div class="page-header">
			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/logout.php" class="btn btn-primary">Logout</a>

				</div>
			</div>
			<h1>Approve songs</h1>
		</div>

		<table class="table table-bordered table-striped table-hover table-condensed" align="center" border="1px solid black" color:black;>
			<tr>
				<th>ID</th>
				<th>Song Name</th>
				<th>Genre</th>
				<th>Download</th>
				<th>Song Owner</th>
				<th>Flag</th>
			</tr>
			<?php
			while ($row=$result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row["songname"]."</td>";
				echo "<td>".$row["genre"]."</td>";
				echo "<td>".$row["download"]."</td>";
				echo "<td>".$row["songowner"]."</td>";
				echo "<td>".$row["flag"]."</td>";
				echo "</tr>";
			}
			?>
		</table>



<!-- 		<form action="" method="POST">
			ID of song: <input type="number" name="id" /> <br/>
			<input type="submit">

		</form> -->



		<div class="row">
			<div class="Absolute-Center is-Responsive">
				<div id="logo-container"></div>
				<div class="col-sm-12 col-md-10 col-md-offset-1">
					<form action="" method="POST" id="adminForm">
						<div class="form-group input-group" style="margin-top: 50px;">
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
							<input class="form-control" type="number" name="id" placeholder="id of song" required/>
						</div>
						<div class="form-group">
							<input type="submit"  value="Approve" class="btn btn-def btn-block"></input>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</body>
</html>