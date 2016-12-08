<?php
session_start();



if (!empty($_POST['submit'])) {
		# code...
	include 'connection.php';
	$result = false;
	if ($_POST["pass"] == $_POST["confpass"]){
		$sql = "INSERT INTO users VALUES('" . $_POST["customer_name"] . "','" . $_POST["uname"] . "','" . sha1($_POST["pass"]) . "')";
		// die($sql);
		// echo $sql;
		$result=$db->query($sql);
	}

	if ($result) {
		//die('all good :)');
		header('Location: login.php');
	}else{
		echo 'signup failed :(';
	}

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

	<title>Register</title>
</head>
<body>

	<div class="container">

		<div class="page-header">
			<h1>Register</h1>
			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/login.php" class="btn btn-primary">Login</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="Absolute-Center is-Responsive">
				<div id="logo-container"></div>
				<div class="col-sm-12 col-md-10 col-md-offset-1">
					<form action="" method="POST" id="registerForm">
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
							<input class="form-control" type="text" name='customer_name' placeholder="name" required/>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input class="form-control" type="text" name='uname' placeholder="username" required/>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" type="password" name='pass' placeholder="password" required=/>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" type="password" name='confpass' placeholder="confirm password" required/>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Sign Up" class="btn btn-def btn-block"></input>
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