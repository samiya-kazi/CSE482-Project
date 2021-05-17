<?php  
	include_once 'includes/db.php';

	if(isset($_POST['email'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."' LIMIT 1;";

		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0) {
			$resultRow = mysqli_fetch_assoc($result);
			$uid = $resultRow['id'];
			$name = $resultRow['name'];
			$gender = $resultRow['gender'];
			$date = date("d-m-Y");

			session_start();
			$_SESSION['uid'] = $uid;
			$_SESSION['name'] = $name;
			$_SESSION['date'] = $date;
			$_SESSION['gender'] = $gender;
	
			header("Location:home.php");
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary</title>
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

	<div class="main">
		<div class="site-info-section">
			<div class="site-info">
				<h1>Welcome to Nutri-Diary!</h1>
				<img id="landing-image" src="images/healthy-woman.png">
				<h4>Need help understanding your nutrition and diet? Track your calories and macro nutrients to reach your health goals!</h4>
			</div>
		</div>
		<div class="login-section">
			<div class="mini-form">
				<form method="POST" action="#">
					<h2 class="form-title">Login</h2>
					<label for="email">E-mail:</label>
			    	<input class="form-input" type="email" id="email" name="email" placeholder="E-mail">

			    	<label for="password">Password: </label>
			    	<input class="form-input" type="password" id="password" name="password" placeholder="Password">

			    	<p class="alert">
						<?php
							if(isset($_POST['email']) && isset($_POST['password'])) {
								if($resultCheck == 0) {
									echo "Email and password do not match.";
								}
							}
						?>
					</p>

			    	<button type="submit" value="Submit">Login</button>
				</form>
				<p class="register-link">Don't have an account? Register <a href="register.php">here.</a></p>
			</div>
		</div>
	</div>
</body>
</html>