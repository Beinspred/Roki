<?php

// Post provjeramo da imamo u postu korisnika:
if($_POST['REQUEST_METHOD'] == "Post"){
    $username= $_POST('username');
    $password= $_POST('password');
}

require_once('connections_database.php');

//Select
$select= "SELECT username,password FROM Korisnici WHERE username= {'$username'}, password= {'$password'} ";
$rezultati = $conn->query($select);
$korisnici= [];

if($rezultati ->num_rows >0){
    while ($row = $rezultati->fetch_assoc())    {
        $korisnici = $row;
    }
}

//Sesion

session_start();
$_SESSION['korisnici']= $korisnici;
$_SESSION['korisnici']= 'username';
$_SESSION['korisnici']= 'password';

header('Location: /admin/index.php');


