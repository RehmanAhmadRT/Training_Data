<?php

require __DIR__.'/vendor/autoload.php';
use Doctrine\DBAL\Configuration;

// Singleton to connect db.
class ConnectDb {

  // Hold the class instance.
  private static $instance = null;
  private static $conn;
  
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '123';
  private $name = 'testDB';

  private function __construct()
  {
        $config = new Configuration();
        $connectionParams = array('user'=>'root','password'=>'123','dbname'=>'testDB','driver'=>'pdo_mysql','host'=>'localhost');
        self::$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
  }   
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }
    return self::$instance;
  }
  
  public function getConnection()
  {
    return self::$conn;  
  }
}

    $connectDb = ConnectDb::getInstance();
    if($connectDb!=null){
      echo "<br>Instance is not null";
    }else{
      echo "<br>Instance is null";
    }
    $connection=$connectDb->getConnection();
    $query = "select * from Bio";
    $prepStmt=$connection->prepare($query);
    $prepStmt->execute();
    while ($row = $prepStmt->fetch()) {
      echo "<br>id: " .$row['id'] .", name: " .$row['name'].", address: ".$row['address'];
    }

?>