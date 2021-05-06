<?php

$servername = "localhost";
$username = "roki";
$password = "roki";
$roki = "roki";
$id=3;
$conn = mysqli_connect($servername, $username, $password, $roki);

if (!$conn) {
    die ("Connecetion failed: " . mysqli_connect_error());
}

$select = "SELECT id,ime_proizvoda, cijena FROM products WHERE id='{$id}'";
$rezultat= $conn->query($select);
$proizvod = [];

if($rezultat ->num_rows > 0){
    while ($row = $rezultat->fetch_assoc()){
        $proizvod = $row;
    }
}
//var_dump($proizvod);

session_start();
$korisnici = [];
$korisnici = $row;
$_SESSION['korisnici']= $korisnici;
$_SESSION['korisnici'] ['username'] ;
$_SESSION['korisnici'] ['password'] ;


33