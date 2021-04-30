<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Journal Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="index.php">Login</a></li>
				<li class="navitem"  id="logo"><a class="navlink" href="index.php">Nutri-Journal</a></li>
			</ul>
		</div>
	</div>
	<div class="register-form">
		<form name="registration-form">
			<h1>Registration</h1>

			<label for="name" class="form-label">Name:</label>
			<input class="form-input" type="text" id="name" name="name" onkeyup="validateName()">
			<br>
			<p class="alert" id="name-alert"></p>

			<label for="email" class="form-label">E-mail:</label>
			<input class="form-input" type="email" id="email" name="email">
			<br>

			<label for="password" class="form-label">Password:</label>
			<input class="form-input" type="password" id="password" name="password" onkeyup="validatePassword()">
			<br>
			<p class="alert" id="password-alert"></p>

			<label for="password" class="form-label">Re-type Password:</label>
			<input class="form-input" type="password" id="confirm-password" name="confirm-password" onkeyup="validateConfirmPassword()">
			<br>
			<p class="alert" id="confirm-password-alert"></p>

			<label class="form-label">Gender: </label>
			<input type="radio" id="male" name="gender" value="male">
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" value="female">
			<label for="female">Female</label>
			<input type="radio" id="other" name="gender" value="other">
			<label for="other">Other</label>
			<br>

			<button type="submit" value="Submit">Register</button>
		</form>
	</div>

	<script>
		function validateName() {
			var name = document.forms["registration-form"]["name"].value,
			nameAlert = document.getElementById("name-alert")

			if(!name.length)
				nameAlert.innerHTML = "Name must not be empty."
			else
				nameAlert.innerHTML = null
		}

		function validatePassword() {
			var password = document.forms["registration-form"]["password"].value,
			passwordAlert = document.getElementById("password-alert")

			if(password.length < 8 || password.length > 32)
				passwordAlert.innerHTML = "Password must be between 8 to 32 characters."

			else 
				passwordAlert.innerHTML = null
		}


		function validateConfirmPassword() {
			var password = document.forms["registration-form"]["password"].value,
			confirmPassword = document.forms["registration-form"]["confirm-password"].value,
			confirmPasswordAlert = document.getElementById("confirm-password-alert")

			if(confirmPassword != password)
				confirmPasswordAlert.innerHTML = "Passwords do not match."
			else
				confirmPasswordAlert.innerHTML = null
		}
	</script>

</body>
</html>