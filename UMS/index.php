<?php
include  __DIR__.'/dbaccess.php';
static $result=null;

if(isset($_GET)){
  $db=new \access1\DbAccess();
  $result=$db->selectAll();
  echo json_encode($result);
}
else if(isset($_POST)){
  $var = json_decode(file_get_contents('php://input'), true);
  $db=new \access1\DbAccess();
  $result=$db->insertUser($var);

  echo $result;

}

 ?>
