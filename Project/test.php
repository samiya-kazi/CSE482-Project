<?php
	include_once 'includes/db.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>hey</title>
</head>
<body>
	<?php
		$foodID = $_POST['food-select'];
		$numServings = $_POST['num-servings'];
		$mealType = $_POST['meal-type'];

		echo "Food ID: ".$foodID;
		echo "Number of servings: ".$numServings;
		echo "Meal type: ".$mealType;
	?>

	<div class="card">
		<input name="food-select" class="radio" type="radio" value="food-id">
		<label class="food-details">
			<p class="food-name">Basic</p>
			<p class="serving-size">$0</p>
			<p>kcal per serving</p>
		</label>
	</div>

</body>
</html>