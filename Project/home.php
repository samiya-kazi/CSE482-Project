<?php
	include_once 'includes/db.php';
	session_start();

	$uid = $_SESSION['uid'];
	$date = $_SESSION['date'];

	//Convert date to format that matches MySQL server (YYYY-dd-mm)
	$newDate = date("Y-m-d", strtotime($date));

	//Set day of week
	$dayOfWeek = date("l", strtotime(date("m-d-Y", strtotime($date))));


	//SQL query for getting breakfast food details
	$sqlBreakfast = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Breakfast' AND date = '".$newDate."';";

	$resultBreakfast = mysqli_query($conn, $sqlBreakfast);
	$resultBreakfastCheck = mysqli_num_rows($resultBreakfast);


	//SQL query for getting lunch food details
	$sqlLunch = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Lunch' AND date = '".$newDate."';";

	$resultLunch = mysqli_query($conn, $sqlLunch);
	$resultLunchCheck = mysqli_num_rows($resultLunch);


	//SQL query for getting dinner food details
	$sqlDinner = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Dinner' AND date = '".$newDate."';";

	$resultDinner = mysqli_query($conn, $sqlDinner);
	$resultDinnerCheck = mysqli_num_rows($resultDinner);


	//SQL query for getting snack food details
	$sqlSnack = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Snack' AND date = '".$newDate."'";

	$resultSnack = mysqli_query($conn, $sqlSnack);
	$resultSnackCheck = mysqli_num_rows($resultSnack);



	//SQL query for getting totals for calories, fat, protein and sugar intake
	$sqlTotal = "SELECT SUM(total_cal) as totalCal, SUM(total_fat) as totalFat, SUM(total_protein) as totalProtein, SUM(total_sugar) as totalSugar FROM meal WHERE u_id = '".$uid."' AND date ='".$newDate."';";

	$resultTotal = mysqli_query($conn, $sqlTotal);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="index.php">Logout</a></li>
				<li class="navitem"><a class="navlink" href="recipes.php">Recipes</a></li>
				<li class="navitem"><a class="navlink" href="home.php">Home</a></li>
				<li class="navlogo"><a class="navlink" href="home.php"><img src="images/logo.png"></a></li>
			</ul>
		</div>
	</div>
	<div>
		<h1 id="welcome">Welcome back, 
			<?php
				echo $_SESSION["name"] . "!";
			?>
		</h1>
	</div>
	<div>
		<div id="diary-section">
			<form action="previous-entries.php">
				<button>Previous Entries</button>
			</form>
		</div>
		
		<div id="food-search">
			<form method="POST" action="search-food.php">
				<label for="food-search">Search food:</label>
			    <input class="form-input" type="text" id="food-search" name="food-search" placeholder="Search food..." required="">
			    <button id="search-button" type="submit" value="Submit">Search</button>
			</form>
		</div>

		<div class="entry">
			<div class="entry-date"><h2>Today's Entry</h2>
				<h3>
					<?php
						echo "Date: ".$_SESSION["date"]." (".$dayOfWeek.")";
					?>
				</h3>
			</div>
			<div>
				<div class="meal">
					<h4 class="meal-type">Breakfast</h4>
					<table>
						<?php
							if($resultBreakfastCheck > 0) {
								echo "<tr>
										<th>Food</th>
										<th>Serving</th>
										<th>Calories</th>
										<th>Fat</th>
										<th>Protein</th>
										<th>Sugar</th>
									</tr>";

								while($row = mysqli_fetch_assoc($resultBreakfast)) {
									echo "<tr>";
									echo "<td>".$row['food_name']."</td>";
									echo "<td>".$row['servings']." servings</td>";
									echo "<td>".$row['total_cal']." kcal</td>";
									echo "<td>".$row['total_fat']." g</td>";
									echo "<td>".$row['total_protein']." g</td>";
									echo "<td>".$row['total_sugar']." g</td>";
									echo "</tr>";
								}
							} else {
								echo "No entries to show.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Lunch</h4>
					<table>
						<?php
							if($resultLunchCheck > 0) {
								echo "<tr>
										<th>Food</th>
										<th>Serving</th>
										<th>Calories</th>
										<th>Fat</th>
										<th>Protein</th>
										<th>Sugar</th>
									</tr>";

								while($row = mysqli_fetch_assoc($resultLunch)) {
									echo "<tr>";
									echo "<td>".$row['food_name']."</td>";
									echo "<td>".$row['servings']." servings</td>";
									echo "<td>".$row['total_cal']." kcal</td>";
									echo "<td>".$row['total_fat']." g</td>";
									echo "<td>".$row['total_protein']." g</td>";
									echo "<td>".$row['total_sugar']." g</td>";
									echo "</tr>";
								}
							} else {
								echo "No entries to show.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Dinner</h4>
					<table>
						<?php
							if($resultDinnerCheck > 0) {
								echo "<tr>
										<th>Food</th>
										<th>Serving</th>
										<th>Calories</th>
										<th>Fat</th>
										<th>Protein</th>
										<th>Sugar</th>
									</tr>";

								while($row = mysqli_fetch_assoc($resultDinner)) {
									echo "<tr>";
									echo "<td>".$row['food_name']."</td>";
									echo "<td>".$row['servings']." servings</td>";
									echo "<td>".$row['total_cal']." kcal</td>";
									echo "<td>".$row['total_fat']." g</td>";
									echo "<td>".$row['total_protein']." g</td>";
									echo "<td>".$row['total_sugar']." g</td>";
									echo "</tr>";
								}
							} else {
								echo "No entries to show.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Snack</h4>
					<table>
						<?php
							if($resultSnackCheck > 0) {
								echo "<tr>
										<th>Food</th>
										<th>Serving</th>
										<th>Calories</th>
										<th>Fat</th>
										<th>Protein</th>
										<th>Sugar</th>
									</tr>";

								while($row = mysqli_fetch_assoc($resultSnack)) {
									echo "<tr>";
									echo "<td>".$row['food_name']."</td>";
									echo "<td>".$row['servings']." servings</td>";
									echo "<td>".$row['total_cal']." kcal</td>";
									echo "<td>".$row['total_fat']." g</td>";
									echo "<td>".$row['total_protein']." g</td>";
									echo "<td>".$row['total_sugar']." g</td>";
									echo "</tr>";
								}
							} else {
								echo "No entries to show.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type" >Total</h4>
					<table>
						<?php
							echo "<tr>
								<th></th>
								<th></th>
								<th>Calories</th>
								<th>Fat</th>
								<th>Protein</th>
								<th>Sugar</th>
							</tr>";

							$total = mysqli_fetch_assoc($resultTotal);

							if($total['totalCal'] != null) {
								echo "<tr>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td>".$total['totalCal']." kcal</td>";
								echo "<td>".$total['totalFat']." g</td>";
								echo "<td>".$total['totalProtein']." g</td>";
								echo "<td>".$total['totalSugar']." g</td>";
							} else {
								echo "<tr>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td>0 kcal</td>";
								echo "<td>0 g</td>";
								echo "<td>0 g</td>";
								echo "<td>0 g</td>";
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>