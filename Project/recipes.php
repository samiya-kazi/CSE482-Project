<!DOCTYPE html>
<html>
<head>
	<title>Nutri-Diary: Recipes</title>
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
	<div class="recipe-main">
		<div class="recipe-list">
			<h4>Keto recipes:</h4>
			<button class="recipe-button" onclick="getRecipe('recipe1')">Keto Fried Chicken</button>
			<button class="recipe-button" onclick="getRecipe('recipe2')">Keto Chicken Soup</button>
			<button class="recipe-button" onclick="getRecipe('recipe3')">Keto Chocolate Cake</button>
		</div>

		<div class="recipe-details-section">
			<div class="recipe-details">
				<div id="recipe-intro">
					<h2>Take a gander at our recipes!</h2>
					<img src="images/table-food.jpg" class="intro-pic">
					<p>Need some inspiration for your health endevours? Try our assortment of delicous and nutrious recipes. From keto to vegetarian options, you're bound to find something to nourish yourself and your family.</p>
				</div>
				<h3 id="recipe-name"></h3>
				<div id="top-details">
					<div>
						<div id="servings" class="details"></div>
						<div id="timing" class="details"></div>
						<div id="ingredients" class="details"></div>
					</div>
					<div id="recipe-pic-section">
					</div>
				</div>
				<div id="recipe-steps"></div>
			</div>
		</div>
	</div>
</body>
<script>
	function getRecipe(recipe_num) {
		let req = new XMLHttpRequest()
		req.open("GET", "recipes.json", asyn=true)
		console.log(recipe_num)

		req.onload = function() {
			if(this.status == 200) {
				let recipesJSON = JSON.parse(this.responseText);

				//Clear out what is being displayed in the intro 
				document.getElementById('recipe-intro').innerHTML = "";

				//Display recipe name, number of servings and timing
				document.getElementById('recipe-name').innerHTML = recipesJSON[recipe_num]['name']
				document.getElementById('recipe-name').setAttribute("class", "recipe-name")
				document.getElementById('servings').innerHTML = recipesJSON[recipe_num]['servings']
				document.getElementById('timing').innerHTML = "Timing: " + recipesJSON[recipe_num]['time']


				//Display ingredients as unordered list form array
				let ingredientArray = recipesJSON[recipe_num]['ingredients'],
				ingredientList = document.createElement('ul')
				document.getElementById('ingredients').innerHTML = "Ingredients: "
				document.getElementById('ingredients').appendChild(ingredientList)

				for(i = 0; i < ingredientArray.length; i++) {
					let ingredient = document.createElement('li');
					ingredient.innerHTML = ingredientArray[i]
					ingredientList.appendChild(ingredient);
				}


				//Display steps as ordered list from array
				let stepsArray = recipesJSON[recipe_num]['steps'],
				stepsList = document.createElement('ol')
				document.getElementById('recipe-steps').innerHTML = "Steps: "
				document.getElementById('recipe-steps').appendChild(stepsList)

				for(i = 0; i < stepsArray.length; i++) {
					let step = document.createElement('li');
					step.innerHTML = stepsArray[i]
					stepsList.appendChild(step);
				}

				//Set recipe picture
				let recipePic = document.createElement('img')
				recipePic.setAttribute("src", recipesJSON[recipe_num]['image_url'])
				recipePic.setAttribute("id", "recipe-pic")
				document.getElementById('recipe-pic-section').innerHTML = ""
				document.getElementById('recipe-pic-section').appendChild(recipePic)
			}
		}

		req.send();
	}
</script>
</html>