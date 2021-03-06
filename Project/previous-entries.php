<?php
	include_once('includes/db.php');
	session_start();

	if(!isset($_SESSION['uid'])) {
		header("Location:index.php");
	}

	$uid = $_SESSION['uid'];

	if(isset($_POST['date-search'])) {
		$date = $_POST['date-search'];

		//Convert date to format that matches MySQL server (YYYY-dd-mm)
		$sqlDate = date("Y-m-d", strtotime($date));

		//Covert date to format that is easier for the user to read (dd/mm/YYYY)
		$newDate = date("d-m-Y", strtotime($date));
		$dayOfWeek = date("l", strtotime($date));


		//SQL query for getting breakfast food details
		$sqlBreakfast = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Breakfast' AND date = '".$sqlDate."';";

		$resultBreakfast = mysqli_query($conn, $sqlBreakfast);
		$resultBreakfastCheck = mysqli_num_rows($resultBreakfast);



		//SQL query for getting lunch food details
		$sqlLunch = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Lunch' AND date = '".$sqlDate."';";

		$resultLunch = mysqli_query($conn, $sqlLunch);
		$resultLunchCheck = mysqli_num_rows($resultLunch);



		//SQL query for getting dinner food details
		$sqlDinner = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Dinner' AND date = '".$sqlDate."';";

		$resultDinner = mysqli_query($conn, $sqlDinner);
		$resultDinnerCheck = mysqli_num_rows($resultDinner);



		//SQL query for getting snack food details
		$sqlSnack = "SELECT food.food_name, meal.servings, meal.total_cal, meal.total_fat, meal.total_protein, meal.total_sugar FROM meal JOIN food ON meal.f_id = food.f_id WHERE u_id = '".$uid."' AND meal_type = 'Snack' AND date = '".$sqlDate."'";

		$resultSnack = mysqli_query($conn, $sqlSnack);
		$resultSnackCheck = mysqli_num_rows($resultSnack);


		//SQL query for getting exercise entries
		$sqlExcercise = "SELECT exercise_name, time, cal_burned FROM exercise WHERE u_id = '".$uid."' AND date = '".$sqlDate."'";

		$resultExercise = mysqli_query($conn, $sqlExcercise);
		$resultExerciseCheck = mysqli_num_rows($resultExercise);


		//SQL query for getting totals for calories, fat, protein and sugar intake
		$sqlTotalFood = "SELECT SUM(total_cal) as totalCal, SUM(total_fat) as totalFat, SUM(total_protein) as totalProtein, SUM(total_sugar) as totalSugar FROM meal WHERE u_id = '".$uid."' AND date ='".$sqlDate."';";

		$resultTotalFood = mysqli_query($conn, $sqlTotalFood);


		//SQL query for getting total exercise information
		$sqlTotalExercise = "SELECT SUM(cal_burned) as totalCalBurned FROM exercise WHERE u_id = '".$uid."' AND date = '".$sqlDate."';";

		$resultTotalExercise = mysqli_query($conn, $sqlTotalExercise);
		$totalExercise = mysqli_fetch_assoc($resultTotalExercise);


		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Previous Entries</title>
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
	<div>
		<h1 id="previous-entries">Previous Entry</h1>
	</div>
	<div>
		<div id="diary-section">
			<form action="home.php">
				<button>Today's Entry</button>
			</form>
		</div>
		
		<div id="date-search">
			<form method="POST" action="#">
				<label for="date-search">Choose date:</label>
			    <input class="form-input" type="date" id="date-search" name="date-search">
			    <button id="search-button" type="submit" value="Submit">Search</button>
			</form>
		</div>

		<div class="entry">
			<div class="entry-date">
				<h2>
					<?php
						if(isset($_POST['date-search'])){
							echo "Entry of: ".$newDate." (".$dayOfWeek.")";
						} else {
							echo "Please pick a date.";
						}
					?>
				</h2>
			</div>


			<div>
				<div class="meal">
					<h4 class="meal-type">Breakfast</h4>
					<table>
						<?php
							if(isset($_POST['date-search'])) {
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
							} else {
								echo "No date picked.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Lunch</h4>
					<table>
						<?php
							if(isset($_POST['date-search'])) {
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
							} else {
								echo "No date picked.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Dinner</h4>
					<table>
						<?php
							if(isset($_POST['date-search'])) {
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
							} else {
								echo "No date picked.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Snack</h4>
					<table>
						<?php
							if(isset($_POST['date-search'])) {
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
							} else {
								echo "No date picked.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Exercise</h4>
					<table>
						<?php
							if(isset($_POST['date-search'])) {
								if($resultExerciseCheck > 0) {
									echo "<tr>
											<th>Activity</th>
											<th>Time</th>
											<th>Calories burned</th>
											<th></th>
											<th></th>
											<th></th>
										</tr>";

									while($row = mysqli_fetch_assoc($resultExercise)) {
										echo "<tr>";
										echo "<td>".$row['exercise_name']."</td>";
										echo "<td>".$row['time']." min</td>";
										echo "<td>".$row['cal_burned']." kcal</td>";
										echo "</tr>";
									}
								} else {
									echo "No entries to show.";
								}
							} else {
								echo "No date picked.";
							}
						?>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type" >Total</h4>
					<table>
						<?php
							if(isset($_POST['date-search'])){
								echo "<tr>
									<th></th>
									<th></th>
									<th>Calories</th>
									<th>Fat</th>
									<th>Protein</th>
									<th>Sugar</th>
								</tr>";

								$totalFood = mysqli_fetch_assoc($resultTotalFood);
								$totalCal = $totalFood['totalCal'] - $totalExercise['totalCalBurned'];

								if($totalFood['totalCal'] != null) {
									echo "<tr>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>".$totalCal." kcal</td>";
									echo "<td>".$totalFood['totalFat']." g</td>";
									echo "<td>".$totalFood['totalProtein']." g</td>";
									echo "<td>".$totalFood['totalSugar']." g</td>";
								} else {
									echo "<tr>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>0 kcal</td>";
									echo "<td>0 g</td>";
									echo "<td>0 g</td>";
									echo "<td>0 g</td>";
								}
							} else {
								echo "No date picked.";
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>