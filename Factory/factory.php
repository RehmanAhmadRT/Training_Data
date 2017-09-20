<?php
define("servername", "localhost");
define("dbname","testDB");
define("username", "root");
define("password", "123");

class Person{
	var $id="";
	var $name="";
	var $address="";

	function Person($id,$name,$address){
		$this->id=$id;
		$this->name=$name;
		$this->address;
	}
}

class PersonFactory{
	function create($record){
		return new Person(
			$record['id'],
			$record['name'],
			$record['address']);
	}
}

class Database{

	function &selectAll(){
		$conn = mysqli_connect(servername,username,password,dbname) or die("Connection unsuccefull");
		echo "Connection Successful<br>";

		$selectStmt = "select * from Bio";
		$result = $conn->query($selectStmt);
		$resultArray= array();
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$fatory=new PersonFactory();
				$resultArray[]=$fatory->create($row);
				echo $row['id']." ".$row['name']." ".$row['address']." ";
			}
		}else{
			echo "No data to be displayed";
		}
		return $resultArray;
	}

	function displayAll(){
		$resultArray=selectAll();
		// foreach ($resultArray as $person) {
		// 	echo $person['id']." ".$person['name']." ".$person['address']." "; 
		// }
	}

}

$db=new Database();
$db->displayAll();

?>