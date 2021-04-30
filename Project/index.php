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

	<div class="main">
		<div class="site-info">
			<img id="landing-image" src="images/healthy-woman.png">
			<h4>Track your calories and macro nutrients to reach your health goals!</h4>
		</div>
		<div class="login-section">
			<div class="login-form">
				<form>
					<h3>Login Here</h3>
					<label for="email">E-mail:</label>
			    	<input class="form-input" type="email" id="email" name="email" placeholder="E-mail">

			    	<label for="password">Password: </label>
			    	<input class="form-input" type="password" id="password" name="password" placeholder="Password">

			    	<button type="submit" value="Submit">Login</button>
				</form>
				<p>Don't have an account? Register <a href="register.php">here.</a></p>
			</div>
		</div>
	</div>
</body>
</html>