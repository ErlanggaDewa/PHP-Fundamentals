	<?php 
	session_start();

		if (isset($_SESSION["login"])) {
			echo "<script>document.location.href='administrator.php';</script>";
			exit;
		}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-3" >
		<h1>LOGIN-4403</h1>
		
		<?php 
		require 'connect2.php';
			if (isset($_POST["login"])){
				ceklogin($_POST);
			}
		?>

		<form action="" method="POST">
			<input type="text" name="username" placeholder="Username" autocomplete="off" required="true" autofocus="on">
			<input type="password" name="password" placeholder="Password" required="true">
			<button type="submit" name="login">Login</button> <br>
			<input type="checkbox" name="rememberme" value="rememberme">Remember Me<br>
			<a href="register.php">Register here. </a>
		</form>
	
	</div>
</body>
</html>