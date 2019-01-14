<?php
	$servername = "localhost";
	$username = 'root';
	$password = '';
	$dbname = "registration";
	
	if (isset($_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['address'])){
		$dbFName = $_POST['firstname'];
		$dbLName = $_POST['lastname'];
		$dbAge = $_POST['age'];
		$dbAddress = $_POST['address'];
		
		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO registration_tb (first_name, last_name, age, address)
		VALUES ('{$dbFName}', '{$dbLName}', '{$dbAge}', '{$dbAddress}')";

		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		
	}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>

<h2>Admin Panel</h2>

<button class="open-button" onclick="openForm()">Register</button>

<div class="form-popup" id="myForm">
  <form action="registration.php" method="post" class="form-container">
	<h1>Register</h1>
	
	<label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="Enter your First Name" name="firstname">
	
	<label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter your Last Name" name="lastname">
	
	<label for="age"><b>Age</b></label>
    <input type="text" placeholder="Enter you Age" name="age">
	
	<label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address">
	
	<button type="submit" class="btn">Submit</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>