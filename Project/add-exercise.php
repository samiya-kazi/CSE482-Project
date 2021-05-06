<?php
	include 'includes/db.php';
	session_start();

	if(!isset($_SESSION['uid'])) {
		header("Location:index.php");
	}

	$uid = $_SESSION['uid'];
	$date = $_SESSION['date'];
	$newDate = date("Y-m-d", strtotime($date));

	if(isset($_POST['exercise-name'])) {
		$exerciseName = $_POST['exercise-name'];
		$exerciseTime = $_POST['time'];
		$calBurned = $_POST['calories-burned'];

		echo $exerciseName . "<br>";
		echo $exerciseTime . "<br>";
		echo $calBurned . "<br>";


		$sqlExercise = "INSERT INTO exercise (u_id, date, exercise_name, time, cal_burned) VALUES ('".$uid."', '".$newDate."', '".$exerciseName."', ".$exerciseTime.", ".$calBurned.");";

		$resultExercise = mysqli_query($conn, $sqlExercise);

		if($resultExercise) {
			header("Location:home.php");
		} else {
			echo "An error has occured.";
		}
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Add Exercise</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
	<div class="main">
		<div class="exercise-form">
			<form method="POST" action="#">
				<h2 class="form-title">Add Exercise</h2>
				<label for="exercise-name">Exercise Name: </label>
			    <input class="form-input" type="text" id="exercise-name" name="exercise-name" placeholder="Excercise Name" required="required">

			    <label for="time">Time Exercised: </label>
			    <input class="form-input" type="number" id="time" name="time" placeholder="Time Exercised" required="required">

			    <label for="calories-burned">Calories Burned: </label>
			    <input class="form-input" type="number" id="calories-burned" name="calories-burned" placeholder="Calories Burned" required="required">

			    <button type="submit" value="Submit">Add Exercise</button>

			</form>
		</div>
	</div>

</body>
</html>