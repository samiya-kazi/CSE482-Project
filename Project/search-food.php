<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary Search</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="index.php">Logout</a></li>
				<li class="navitem"><a class="navlink" href="home.php">Recipes</a></li>
				<li class="navitem"><a class="navlink" href="home.php">Home</a></li>
				<li class="navitem"  id="logo"><a class="navlink" href="home.php">Nutri-Diary</a></li>
			</ul>
		</div>
	</div>
	<div>
		<?php
			$foodName = $_POST['food-search'];
			echo $foodName;
		?>
	</div>

</body>
</html>