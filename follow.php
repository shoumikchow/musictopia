<?php
session_start();
include "searchresults.php";
include "connection.php";

if(isset($_POST['comment'])){
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			$sqlfoll="UPDATE followers SET currentuser='" . $_SESSION["name"] . "' AND following='".$row["uname"]."'";
			die($sqlfoll);
			//$resultfoll=$db->query($sqlfoll);
			//"Location: profile.php";
		}
	}
}
?>