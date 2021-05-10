<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="GET"){
    $id=$_GET['id'];
    if(empty($id)){
        error_log("Nema id za edit");
    }
}
if(isset($_SESSION['korpa'][$id])){
$_SESSION['korpa'][$id]++;
} else{
    $_SESSION['korpa'][$id]=1;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
var_dump($_SESSION['korpa'], $_SERVER);