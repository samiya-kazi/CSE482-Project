<?php  
	include_once 'includes/db.php';

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

			$sql1 = "INSERT INTO users (email, name, password, gender) VALUES ('".$email."', '".$name."', '".$password."', '".$gender."');";

			$result = mysqli_query($conn, $sql1);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Journal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="register.php">Register</a></li>
				<li class="navitem"  id="logo"><a class="navlink" href="index.php">Nutri-Journal</a></li>
			</ul>
		</div>
	</div>
	<div>
		<?php
			if($result == '1') {
				echo "Registration successful. Please try logging in.";
			} else {
				echo "The email you have entered is already in use.";
			}
		?>
	</div>
</body>
</html>