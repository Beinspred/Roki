<?php
require_once('session.php');

if($_SERVER['REQUEST_METHOD']== "GET"){
    $id= $_GET['id'];
      if(empty($id)){
          die("Nema id");
      }
}

/*DATABASE*/
require_once('../connections_database.php');


$sql = "DELETE FROM products WHERE id='{$id}'";

if($conn->query($sql)== TRUE){
    echo "Proizvod uspjesno obrisan";
    header('Location: /admin/index.php');
} else {
    die("Error deleting record" . $conn->query());
    header('Location: /admin/index.php');
}
