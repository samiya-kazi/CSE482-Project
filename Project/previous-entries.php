<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Previous Entries</title>
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
</body>
</html>