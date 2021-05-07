<?php
	include_once 'includes/db.php';
	session_start();

	if(!isset($_SESSION['uid'])) {
		header("Location:index.php");
	}

	$uid = $_SESSION['uid'];
	$name = $_SESSION['name'];
	$gender = $_SESSION['gender'];

	//Check if user has diet information submitted
	$sqlInfo = "SELECT * FROM user_info WHERE u_id =".$uid.";";
	$resultInfo = mysqli_query($conn, $sqlInfo);
	$resultInfoCheck = mysqli_num_rows($resultInfo);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Goal Info</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="logout.php">Logout</a></li>
				<li class="navitem"><a class="navlink" href="recipes.php">Recipes</a></li>
				<li class="navitem"><a class="navlink" href="previous-entries.php">Diary</a></li>
				<li class="navitem"><a class="navlink" href="home.php">Home</a></li>
				<li class="navlogo"><a class="navlink" href="home.php"><img src="images/logo.png"></a></li>
			</ul>
		</div>
	</div>

	<div class="goal-main">
		<div class="user-info">
			<div class="info-display">
				<h2>User Information</h2>

				<?php
					if($resultInfoCheck == 1) {
						$userInfo = mysqli_fetch_assoc($resultInfo);
						echo "<div>Name: ".$name."</div>";
						echo "<div>Age: ".$userInfo['age']."</div>";
						echo "<div>Height: ".$userInfo['height']." m</div>";
						echo "<div>Weight: ".$userInfo['weight']." kg</div>";
						echo "<div>Weight goal: ".$userInfo['goal']."</div>";
						echo "<div>Basal metabolic rate: ".$userInfo['basal_cal']."</div>";
					} else {
						echo "<div>Name: ".$name."</div>
							<div>Age:</div>
							<div>Height:</div>
							<div>Weight:</div>
							<div>Weight goal:</div>
							<div>Basal metabolic rate:</div>";
					}
				?>
				
			</div>
		</div>
		<div class="edit-info">
			<div class="mini-form">
				<form method="POST" action="update-info.php">
					<h2 class="form-title">Update Information</h2>

					<label for="age">Age:</label>
			    	<input class="form-input" type="number" id="age" name="age" required="required">

			    	<label for="height">Height (m): </label>
			    	<input class="form-input" type="number" id="height" name="height" step="0.01" required="required">

			    	<label for="weight">Weight (kg): </label>
			    	<input class="form-input" type="number" id="weight" name="weight" step="0.1" required="required">

			    	<label for="goal-type" class="form-label">Goal-type:</label>
					<select class="form-select" name="goal-type" id="goal-type" required="required">
						<option value="Lose weight">Lose weight</option>
						<option value="Maintain weight">Maintain weight</option>
						<option value="Gain weight">Gain weight</option>
					</select>

					<button type="submit" value="Submit">Update</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>