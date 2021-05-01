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
		$email = $_POST['email'];
		$name = $_POST['name'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];

		echo $email;
		echo $name;
		echo $password;
		echo $gender; 
	?>

</body>
</html>