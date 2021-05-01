<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutri-diary Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<div class="navbar-links">
			<ul class="nav-link-list">
				<li class="navitem"><a class="navlink" href="index.php">Logout</a></li>
				<li class="navitem"><a class="navlink" href="home.php">Recipes</a></li>
				<li class="navitem"><a class="navlink" href="home.php">Home</a></li>
				<li class="navitem"  id="logo"><a class="navlink" href="home.php">Nutri-diary</a></li>
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
			<button>Previous Entries</button>
		</div>
		
		<div id="food-search">
			<form method="POST" action="search-food.php">
				<label for="food-search">Search food:</label>
			    <input class="form-input" type="text" id="food-search" name="food-search" placeholder="Search food...">
			    <button id="search-button" type="submit" value="Submit">Search</button>
			</form>
		</div>

		<div class="entry">
			<div class="entry-date"><h2>Today's Entry</h2>
				<h3>
					<?php
						echo "Date: ".$_SESSION["date"]."";
					?>
				</h3>
			</div>
			<div>
				<div class="meal">
					<h4 class="meal-type">Breakfast</h4>
					<table>
						<tr>
							<th>Food</th>
							<th>Serving</th>
							<th>Calories</th>
							<th>Fat</th>
							<th>Protein</th>
							<th>Sugar</th>
						</tr>
						<tr>
							<td>Toast</td>
							<td>2 servings</td>
							<td>150 kcal</td>
							<td>2 grams</td>
							<td>6.2 grams</td>
							<td>3 grams</td>
						</tr>
						<tr>
							<td>Orange Juice</td>
							<td>1 servings</td>
							<td>111 kcal</td>
							<td>0.5 grams</td>
							<td>1.7 grams</td>
							<td>21 grams</td>
						</tr>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Lunch</h4>
					<table>
						<tr>
							<th>Food</th>
							<th>Serving</th>
							<th>Calories</th>
							<th>Fat</th>
							<th>Protein</th>
							<th>Sugar</th>
						</tr>
						<tr>
							<td>Toast</td>
							<td>2 servings</td>
							<td>150 kcal</td>
							<td>2 grams</td>
							<td>6.2 grams</td>
							<td>3 grams</td>
						</tr>
						<tr>
							<td>Orange Juice</td>
							<td>1 servings</td>
							<td>111 kcal</td>
							<td>0.5 grams</td>
							<td>1.7 grams</td>
							<td>21 grams</td>
						</tr>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Dinner</h4>
					<table>
						<tr>
							<th>Food</th>
							<th>Serving</th>
							<th>Calories</th>
							<th>Fat</th>
							<th>Protein</th>
							<th>Sugar</th>
						</tr>
						<tr>
							<td>Toast</td>
							<td>2 servings</td>
							<td>150 kcal</td>
							<td>2 grams</td>
							<td>6.2 grams</td>
							<td>3 grams</td>
						</tr>
						<tr>
							<td>Orange Juice</td>
							<td>1 servings</td>
							<td>111 kcal</td>
							<td>0.5 grams</td>
							<td>1.7 grams</td>
							<td>21 grams</td>
						</tr>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type">Snack</h4>
					<table>
						<tr>
							<th>Food</th>
							<th>Serving</th>
							<th>Calories</th>
							<th>Fat</th>
							<th>Protein</th>
							<th>Sugar</th>
						</tr>
						<tr>
							<td>Toast</td>
							<td>2 servings</td>
							<td>150 kcal</td>
							<td>2 grams</td>
							<td>6.2 grams</td>
							<td>3 grams</td>
						</tr>
						<tr>
							<td>Orange Juice</td>
							<td>1 servings</td>
							<td>111 kcal</td>
							<td>0.5 grams</td>
							<td>1.7 grams</td>
							<td>21 grams</td>
						</tr>
					</table>
				</div>
				<div class="meal">
					<h4 class="meal-type" >Total</h4>
					<table>
						<tr>
							<th></th>
							<th></th>
							<th>Calories</th>
							<th>Fat</th>
							<th>Protein</th>
							<th>Sugar</th>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>150 kcal</td>
							<td>2 grams</td>
							<td>6.2 grams</td>
							<td>3 grams</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>