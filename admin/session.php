<?php
session_start();
if(!isset($_SESSION['korisnici'])){
    header('Location: /login.php');
    die();
}