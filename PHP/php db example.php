<?php
$servername ="localhost";
$username = "root";
$password = "123";
$dbname="testDB";

$conn =mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Connection Failed:" .$conn->connect_error);
}
else{
echo "Connection Successfull";
}

$select="select * from Bio";
$result=$conn->query($select);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "<br>" . "id: " . $row["id"] . "  name: " . $row["name"]. " address:" . $row["address"];
	}
}
else{
	echo "<br>zero result";
}

$conn->close();

?>