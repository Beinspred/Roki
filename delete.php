<?php
if($_SERVER['REQUEST_METHOD']== "GET"){
    $id= $_GET['id'];
      if(empty($id)){
          die("Nema id");
      }
}

/*DATABASE*/
$servername = "localhost";
$username = "roki";
$password = "roki";
$roki = "roki";

$conn = mysqli_connect($servername, $username, $password, $roki);
if(!$conn){
    die("Connecetion failed: " .mysqli_connect_error());
}

$sql = "DELETE FROM products WHERE id='{$id}'";

if($conn->query($sql)== TRUE){
    echo "Proizvod uspjesno obrisan";
    header('Location: /');
} else {
    die("Error deleting record" . $conn->query());
    header('Location: /');
}