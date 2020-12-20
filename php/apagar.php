<?php

require '../vendor/autoload.php';
$connect = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_POST['carro']['id'])) {
    
    $id = $_POST['carro']['id'];
    
    $connect->concessionaria->carros->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
}

header('Location: ../');


