<?php

require '../vendor/autoload.php';
$connect = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_POST['carro'])) {
    
    $carro = $_POST['carro'];



    $connect->concessionaria->carros->insertOne($carro);
    
}

header('Location: ../');


