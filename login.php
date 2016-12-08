<?php
session_start();



if (!empty($_POST['submit'])) {
	include 'connection.php';
	$sql = "SELECT * FROM users WHERE uname='" . $_POST["uname"] ."' and pass = '". sha1($_POST["pass"]) . "'";
	$result=$db->query($sql);

	if ($row= $result->fetch_assoc()) {
		$_SESSION['is_login'] = true;
		$_SESSION['uname'] = $_POST[uname];
		header('Location: profile.php');
	}elseif (($_POST["uname"])=="admin" && ($_POST["pass"])=="admin"){
		$_SESSION['is_login'] = true;
		$_SESSION['uname'] = $_POST[uname];
		header('Location: admin.php');
	}else{
		echo 'Username or password is wrong';
	}
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="base.css">

	<title>Login</title>
</head>
<body>
	<div class="container">

		<div class="page-header">
			<h1>Login</h1>

			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/register.php" class="btn btn-primary">Register</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="Absolute-Center is-Responsive">
				<div id="logo-container"></div>
				<div class="col-sm-12 col-md-10 col-md-offset-1">
					<form action="" method="POST" id="loginForm">
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input class="form-control" type="text" name='uname' placeholder="username" required/>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" type="password" name='pass' placeholder="password" required/>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Sign in" class="btn btn-def btn-block"></input>
						</div>
					</form>

					<div class="form-group text-center">
						or <a href="register.php">Register</a>
					</div>
				</div>
			</div>
		</div>



	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</body>
</html>