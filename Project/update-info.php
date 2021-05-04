<?php
	include_once 'includes/db.php';
	session_start();

	$uid = $_SESSION['uid'];
	$gender = $_SESSION['gender'];

	//Check if user has diet information submitted
	$sqlInfo = "SELECT * FROM user_info WHERE u_id =".$uid.";";
	$resultInfo = mysqli_query($conn, $sqlInfo);
	$resultInfoCheck = mysqli_num_rows($resultInfo);


	if(isset($_POST['age'])) {
		$age = $_POST['age'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$goal = $_POST['goal-type'];

		if($gender == "Female") {
			$basalCal = floor(447.593 + (9.247 * $weight) + (3.098 * $height * 100) - (4.330 * $age));
		} else {
			$basalCal = floor(88.362 + (13.397 * $weight) + (4.799 * $height * 100) - (5.677 * $age));
		}


		if($goal == "Lose weight") {
			$basalCal = $basalCal - 500;
		} else if ($goal == "Gain weight") {
			$basalCal = $basalCal + 500;
		}


		if($resultInfoCheck == 0) {
			$sqlNewInfo = "INSERT INTO user_info (u_id, height, weight, goal, age, basal_cal) VALUES ('".$uid."', ".$height.", ".$weight.", '".$goal."', ".$age.", ".$basalCal.");";
			$resultNewInfo = mysqli_query($conn, $sqlNewInfo);
		} else {
			$sqlUpdateInfo = "UPDATE user_info SET height=".$height.", weight=".$weight.", goal='".$goal."', age=".$age.", basal_cal=".$basalCal." WHERE u_id =".$uid;
			$resultUpdate = mysqli_query($conn, $sqlUpdateInfo);
		}

		header("Location:user-goal.php");
	}
?>