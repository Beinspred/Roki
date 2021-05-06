<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
    $name= $_POST['name'];
    $last_name= $_POST['last_name'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];


    if(!empty($name)){
        echo  $name;
    } else{
        echo "Popunite prazna polja";
    }
    if(!empty($last_name)){
        echo $last_name;
    } else{
        echo "Popunite prazna polja";
    }if(!empty($username)){
        echo $username;
    } else{
        echo  "Popunite prazna polja";
    }if(!empty($email)){
        echo $email                                                                                                                                                                                                                             ;
    } else{
        echo "Popunite prazna polja";
    }if(!empty($password)){
        echo "$password";
        } else {
        echo "Popunite prazna polja";
    }
}

//Database

require_once('connections_database.php');


$sql = "INSERT INTO Korisnici (name, last_name, username, email, password)
VALUES ('{$name}' ,'{$last_name}', '{$username}', '{$email}', '{$password}')";

if(mysqli_query($conn, $sql)){
    error_log("Uspjesno ste kreirali korisnika");
    header('Location:/login.php');
} else {
    error_log("Error" .$sql . mysqli_error($conn) );
    header('Location:/signup.php');
    die();
}