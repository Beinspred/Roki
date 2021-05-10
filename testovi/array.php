<?php
ini_set('display_errors', 1);
$niz = ['test1'=>123, 'test2'=>321];
var_dump($niz['test2']);
var_dump($niz);
$niz2 = ['pero', 'djuro', 'mile'];
var_dump($niz2[2]);
$niz3 = [
    ['test1'=>123, 'test2'=>321],
    ['test1'=>258, 'test2'=>564]
];
var_dump($niz3[1]['test2']);

$korpa = [];
$_SESSION['korpa'] = ['id'=>$id, 'kolicina'=>1];
$_SESSION['korpa'] =[
    $id=>1
];
