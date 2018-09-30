<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Mortgage Central</h1>
  <p>Only Signing Up works rn</p>
</div>

<?php
	if (isset($_POST['login'])){
		echo "<div class='alert alert-success'><strong>Success!</strong> The Log In button works</div>";
	} else if(isset($_POST['signup'])){
		echo "<div class='alert alert-success'><strong>Success!</strong> The Sign Up button works</div>";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mortusers";
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "INSERT INTO users (UserEmail, UserPassword)
		VALUES ('" . $email . "', '" . $pwd . "');";

		if ($conn->query($sql) === TRUE) {
			echo "<div class='alert alert-success'><strong>Success!</strong> New account created</div>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	} else {
		echo "<div class='alert alert-warning'><strong>No button pressed!</strong></div>";
	}
?>

<div class="container">
    <form action="login.php" method="post">
		<div class="form-group">
			<label for="email">Email address:</label>
			<input type="email" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="pwd">
		</div>
		<div class="btn-group">
			<button type="submit" name="login" class="btn btn-primary">Log In</button>
			<button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
		</div> 
	</form>
</div>

</body>
</html>