<?php
define("servername", "localhost");
define("dbname","testDB");
define("username", "root");
define("password", "123");

$conn = mysqli_connect(servername,username,password,dbname) or die("Connection unsuccefull");
echo "Connection Successful<br>";


if($_SERVER["REQUEST_METHOD"]='POST'){
	echo "Data recieved is<br>name: ".$_POST["fname"] ." address: " .$_POST["faddress"] ."<br>";
	$insertStmt = "insert into Bio(name,address) values ('".$_POST["fname"]."','".$_POST["faddress"]."')";
	if($conn->query($insertStmt)){
		echo "Data inserted into the database";
	}
	else{
		echo "Error occured while storing the data in database";
	}
}


echo "<br><br> Updated data stored in database is:<br>";

$selectStmt = "select * from Bio";
$result = $conn->query($selectStmt);

if($result->num_rows > 0){
	while ($row = $result->fetch_assoc()) {
		echo "id: " .$row["id"] .", name: " .$row["name"].", address: ".$row["address"] ."<br>";
	}
}else{
	echo "No data to be displayed";
}

$conn->close();
?>