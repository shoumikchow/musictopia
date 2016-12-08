<?php


session_start();

if (!$_SESSION['is_login']) {
		# code...
	header('Location: index.php');
}

//echo $_SESSION["uname"];
$target_dir = "uploads/";

$uploadOk = 1;
$result = false;
if(isset($_POST["submit"])) {

	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$musicFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	//$songname = $_POST["songname"];
	$check="no";
	if (isset($_POST['download']) and $_POST['download'] == "yes"){
		$check="yes";
	}

	include 'connection.php';

	//echo $sql;
	$uploadOk = 1;
	// print_r($_FILES);
	// die;

// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists. Choose another name";
		$uploadOk = 0;
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 25000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
// Allow certain file formats
	if($musicFileType != "mp3") {
		echo "Sorry, only mp3 files are allowed.";
		$uploadOk = 0;
	}
// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$sql = "INSERT INTO songdetails VALUES(NULL, '" . basename( $_FILES["fileToUpload"]["name"]) ."','" . $_POST["genre"] ."','" . $check ."','" . $_SESSION["uname"] ."', '0')";
			//echo "$sql";

			$result=$db->query($sql);
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
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

	<title>Upload</title>
</head>
<body>
	<div class="container">

		<div class="page-header">
			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/logout.php" class="btn btn-primary">Logout</a>

				</div>
			</div>
			<h1>Upload song</h1>
		</div>
		<div class="row">
			<div class="Absolute-Center is-Responsive">
				<div id="logo-container"></div>
				<div class="col-sm-12 col-md-10 col-md-offset-1">

					<form action="upload.php" method="POST" id="uploadForm" enctype="multipart/form-data">

						<div class="form-group input-group">
							<label for="exampleInputFile">Select file</label>
							<input type="file" id="fileToUpload" name="fileToUpload" required>
							<p class="help-block" style="color: #FF1654">Please select mp3 or aac file.</p>
						</div>

						<div class="form-group input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-music"></i></span>
							<input class="form-control" type="text" name='genre' placeholder="Genre" required />
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox" name="download" value="yes"> Enable download?
							</label>
						</div>

						<div class="form-group">
							<input type="submit" name="submit" value="Upload song" class="btn btn-def btn-block"></input>
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


