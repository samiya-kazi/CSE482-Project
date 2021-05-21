<?php  
	include_once 'includes/db.php';

	if(!isset($_POST['email'])) {
		header("Location:index.php");
	}

	$email = $_POST['email'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];

	if(isset($_POST['email'])) {
		$email = $_POST['email'];
		$sql = "SELECT * FROM users WHERE email = '".$email."';";

		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck == 0) {
			$email = $_POST['email'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];

			$sql = "INSERT INTO users (email, name, password, gender) VALUES ('".$email."', '".$name."', '".$password."', '".$gender."');";

			$result = mysqli_query($conn, $sql);

			mysqli_close($conn);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Registration Status</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="register.php">Register</a></li>
				<li class="navlogo"><a class="navlink" href="index.php"><img src="images/logo.png"></a></li>
			</ul>
		</div>
	</div>
	<div>
		<div class="register-status">
			<?php
				if($result == '1') {
					echo "Registration successful. Please try logging in.<br>";
					echo "<a href='index.php'>Login</a>";
				} else {
					echo "The email you have entered is already in use.<br>";
					echo "Please use another e-mail to register.<br>";
					echo "<a href='register.php'>Register</a>";
				}
			?>
		</div>
	</div>
</body>
</html>