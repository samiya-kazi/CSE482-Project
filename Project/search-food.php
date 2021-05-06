<?php
	include_once 'includes/db.php';
	session_start();

	if(!isset($_SESSION['uid'])) {
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Search</title>
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
					<h2 class="form-title">Add to Meal</h2>
					<label for="num-servings">Servings:</label>
			    	<input class="form-input" type="number" id="num-servings" name="num-servings" step="0.1" required="required">

			    	<label for="meal-type" class="form-label">Meal-type:</label>
					<select class="form-select" name="meal-type" id="meal-type" required="required">
						<option value="Breakfast">Breakfast</option>
						<option value="Lunch">Lunch</option>
						<option value="Dinner">Dinner</option>
						<option value="Snack">Snack</option>
					</select>
					<br>
					<button type="submit" value="Submit">Submit</button>
				</div>
			</div>
		</form>
	</div>

</body>
</html>