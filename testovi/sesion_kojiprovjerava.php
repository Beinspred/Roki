<?php
session_start();
if (!isset($_SESSION['korisnici'])) {
    header('Location: /signup.php');
    die();
}
require_once('test1.php');

