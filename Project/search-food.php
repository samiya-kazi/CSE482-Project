<?php
	include_once 'includes/db.php';
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
		<form method="POST" action="add-meal.php">
			<div class="search-results">
				<h2>
					<?php
						echo "Search Results for '".$_POST['food-search']."':";
					?>
				</h2>
				<div>
					<?php
						$foodName = $_POST['food-search'];
						$foodNameLower = strtolower($foodName);

						$sql = "SELECT * FROM food WHERE lower(food_name) LIKE '%".$foodNameLower."%';";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);

						if($resultCheck > 0) {
							echo "<table>";
							echo "<th></th><th>Item</th><th>Serving size</th><th>Calories per serving</th>";
							while($row = mysqli_fetch_assoc($result)) {
								$foodID = $row['f_id'];
								$foodName = $row['food_name'];
								$servingSize = $row['serving_size'];
								$calories = $row['calories'];

								echo "<tr>";
								echo "<td><input type='radio' id='".$foodID."' name='food-select' value='".$foodID."'</td>";
								echo "<td>".$foodName."</td>";
								echo "<td>".$servingSize."</td>";
								echo "<td>".$calories." kcal</td>";
								echo "</tr>";
							}
							echo "</table>";
						} else {
							echo "No results found.";
						}
					?>
				</div>
			</div>
			<div class="food-submit">
				<div class="mini-form">
					<label for="num-servings">Servings:</label>
			    	<input class="form-input" type="number" id="num-servings" name="num-servings">

			    	<label for="meal-type" class="form-label">Meal-type:</label>
					<select name="meal-type" id="meal-type">
						<option value="Breakfast">Breakfast</option>
						<option value="Lunch">Lunch</option>
						<option value="Dinner">Dinner</option>
						<option value="Dinner">Snack</option>
					</select>
					<br>
					<button type="submit" value="Submit" onclick="validateForm()">Submit</button>
				</div>
			</div>
		</form>
	</div>

</body>
</html>