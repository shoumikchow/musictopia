<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="base.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../../project/js/typed.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>


	<style type="text/css">
		form{text-align: center; margin-top: 50px;}
		input[type="text"]{width: 400px; color:black; font-weight: bold;}
		button[type="submit"]{margin-top: 10px;}
		.element{color: white; font-size: 5em; }
		.typedjs{text-align: center;}
		.typed-cursor{
			opacity: 1;
			-webkit-animation: blink 0.7s infinite;
			-moz-animation: blink 0.7s infinite;
			animation: blink 0.7s infinite;
			color: white;
			font-size: 5em;
		}
		@keyframes blink{
			0% { opacity:1; }
			50% { opacity:0; }
			100% { opacity:1; }
		}
		@-webkit-keyframes blink{
			0% { opacity:1; }
			50% { opacity:0; }
			100% { opacity:1; }
		}
		@-moz-keyframes blink{
			0% { opacity:1; }
			50% { opacity:0; }
			100% { opacity:1; }
		}

	</style>

	<title>Musictopia</title>
</head>
<body>



	<script>
		$(function(){
			$(".element").typed({
				strings: ["Music for your friends.", "Music for your family.", "Music for you.^5000"],
				startdelay: 5000,
				typeSpeed: 0.5,
				loop: true
			});
		});
	</script>
	<div class="container">



		<div class="page-header">

			<div class='btn-toolbar pull-right'>
				<div class='btn-group'>
					<a href="../../project/login.php" class="btn btn-primary">Login</a>
					<a href="../../project/register.php" class="btn btn-primary">Register</a>

				</div>
			</div>
			<h1>Musictopia</h1>
		</div>


		<div class="typedjs">
			<span class="element"></span>
		</div>


		<form action="../../project/searchresults.php" method="GET">
			<input type="text" name="search" placeholder="Enter song or artist or genre you want to search" required/><br>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>


</body>
</html>