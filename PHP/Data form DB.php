<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h4> Enter Following Data To Insert into Database </h4><br>
<form method="post" action="Data form DB2.php">
Name<input type="text" name="fname">
Address<input type="text" name="faddress">
<input type="submit" name="Submit">
</form>

<?php
/*<?php echo htmlspecialchars($_Server["PHP_SELF"]);?> */ 
$name = $address = "none";
if($_SERVER["REQUEST_METHOD"]== 'POST'){
	$name = $_POST["fname"];
	$address = $_POST["faddress"];


$servername="localhost";
$username="root";
$password="123";
$dbname="testDB";

$conn =mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("Connection Failed:" .$conn->connect_error);
}
else{
	echo "Connection Successfull";
}

$insert="insert into Bio(name,address) values('".$name."','".$address."')";

if($conn->query($insert)){
	echo "Data Inserted<br>".$insert;
}
else{
	echo "Error occured ";
}

$conn->close();
}
?>
</body>
</html>