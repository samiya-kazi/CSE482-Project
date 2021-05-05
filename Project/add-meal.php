<?php
	include_once 'includes/db.php';
	session_start();

	if(!isset($_SESSION['uid'])) {
		header("Location:index.php");
	}

	$userID = $_SESSION['uid'];
	$date = $_SESSION['date'];
	$newDate = date("Y-m-d", strtotime($date));

	$foodID = $_POST['food-select'];
	$numServings = $_POST['num-servings'];
	$mealType = $_POST['meal-type'];

	$foodsql = "SELECT * FROM food WHERE f_id = '".$foodID."';";
	$foodresult = mysqli_query($conn, $foodsql);

	$food = mysqli_fetch_assoc($foodresult);
	$calories = $food['calories'];
	$fat = $food['fat'];
	$protein = $food['protein'];
	$sugar = $food['sugar'];

	$totalCalories = $calories * $numServings;
	$totalFat = $fat * $numServings;
	$totalProtein = $protein * $numServings;
	$totalSugar = $sugar * $numServings;

	$addMealSql = "INSERT INTO meal (u_id, f_id, servings, meal_type, date, total_cal, total_fat, total_protein, total_sugar) VALUES ('".$userID."', '".$foodID."', ".$numServings.", '".$mealType."', '".$newDate."', ".$totalCalories.", ".$totalFat.", ".$totalProtein.", ".$totalSugar.");";
	$addMealResult = mysqli_query($conn, $addMealSql);

	if($addMealResult) {
		header("Location:home.php");
	} else {
		echo "An error has occured.";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary Adding meal...</title>
</head>
<body>

</body>
</html>