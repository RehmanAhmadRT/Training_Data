<?php

require __DIR__.'/vendor/autoload.php';
use Doctrine\DBAL\Configuration;

$config = new Configuration();
$connectionParams = array('user'=>'root','password'=>'123','dbname'=>'testDB','driver'=>'pdo_mysql','host'=>'localhost');
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
$query = "select * from Bio";
$prepStmt=$conn->prepare($query);
$prepStmt->execute();
echo "done";
    
while ($row = $prepStmt->fetch()) {
  echo "id: " .$row['id'] .", name: " .$row['name'].", address: ".$row['address'] ."<br>";
}




?>