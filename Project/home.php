<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Journal Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="index.php">Logout</a></li>
				<li class="navitem"  id="logo"><a class="navlink" href="home.php">Nutri-Journal</a></li>
			</ul>
		</div>
	</div>
	<h1>Welcome back, 
		<?php
			echo $_SESSION["name"];
		?>
		!
	</h1>
</body>
</html>