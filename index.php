<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<meta name="viewport" content="width=device-width, initial-scale=10">

	<style>
		body{
            margin: 0;
            padding: 0;
			display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: url(img/bglogin.jfif);
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }

		.welcomebox{
			width: 1300px;
            margin: auto;
		}

		.welcomebox{
			width: 580px;
            height: 300px;
            background: pink;
            color: #000;
            top: 55%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 70px 30px;
            border-radius: 20px;	
		}

		.welcomebox form {
                display: flex;
                flex-wrap: wrap;
        }

		p{
			font-size: 25px;
			
		}
		a{
			text-decoration: none;
			color: black
		}
		a:hover{
			cursor: pointer;
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>

	<div class="welcomebox">
		<div class="header">
			<h1>Registration Successfully!</h1><br>
		</div>
		<div >
			<!-- logged in user information -->
			<?php  if (isset($_SESSION['username'])) : ?>
				<h2 style="color: red;" align="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>
				<br>
				<p align="center"><a href="index.php?logout='1'">Login</a></p>
			<?php endif ?>
		</div>
	</div>
</body>
</html>