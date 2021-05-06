<?php
require_once('session.php');

if($_SERVER["REQUEST_METHOD"] !="POST") {
    header('Location: /create.php');
    die;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ime_proizvoda = $_POST['ime_proizvoda'];
    if (empty($ime_proizvoda)){
       die ("Nema podataka za ime");
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $cijena = $_POST['cijena'];
    if(empty($cijena)){
      die ("Nema podataka za cijenu");
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $opis_proizvoda = $_POST['opis_proizvoda'];
    if(empty($opis_proizvoda)){
        die ("Nema podataka za opis_proizvoda");
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $slika = $_POST['slika'];
    if(empty($slika)){
        die ("Nema podataka za sliku");
        }
    }

/*DATABASE*/
require_once('../connections_database.php');


$sql = "INSERT INTO products (ime_proizvoda, cijena, opis_proizvoda, slika)
 VALUES ('{$ime_proizvoda}', '{$cijena}', '{$opis_proizvoda}', '{$slika}')";

if(mysqli_query($conn, $sql)){
    error_log("Uspjesno dodat proizvod u bazu");
    header('Location: /admin/index.php');
} else {
    error_log("Error" . $sql. "</br> ". mysqli_error($conn));
    header('Location: /admin/create.php');
    die;
}
