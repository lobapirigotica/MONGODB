<?php

require 'vendor/autoload.php';
$connect = new MongoDB\Client("mongodb://localhost:27017");
$carros = $connect->concessionaria->carros;



?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">    
</head>
<body class="bg-light">
<header class="bg-dark shadow">
    <h1 class="text-light">Concessionária</h1>
    <img src="img/carro-icone.png" alt="carro">
</header>    
<main>   

    <div class="container">
        <label for="tableCarro">Lista de Carros</label>
        <table id="tableCarro" class="table border">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Placa</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach ($carros->find() as $carro) {

                        echo '
                        <tr>
                            <td>'.$carro->modelo.'</td>
                            <td>'.$carro->marca.'</td>
                            <td>'.$carro->placa.'</td>
                            <td>
                                <form action="php/apagar.php" method="post">
                                    <input type="hidden" value="'.$carro->_id.'" name="carro[id]">
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                            </td>
                        </tr>
                        ';
                    }

                ?>
            </tbody>
        </table>

        <hr>

        <form class="row g-3" action="php/adicionar.php" method="post">
            <div class="col-md-6">
                <label for="inputModelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="inputModelo" name="carro[modelo]" placeholder="Corola, Vectra, Uno..." required>
            </div>
            <div class="col-md-6">
                <label for="inputMarca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="inputMarca" name="carro[marca]" placeholder="Toyota, Chevrolet, Fiat..." required>
            </div>
            <div class="col-12">
                <label for="inputPlaca" class="form-label">Placa</label>
                <input type="text" class="form-control" id="inputPlaca" name="carro[placa]" placeholder="1A2B-3C4D" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Adicionar</button>
            </div>
        </form>
    </div>
</main>
<footer class="bg-dark"></footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>