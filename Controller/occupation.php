<?php
    include "../Dao/conexao.php";
    $occupation = $_POST['title'];

    $verifica = mysqli_query($conn, "SELECT name FROM occupation WHERE name = '".$occupation."' ");
    $linha = mysqli_num_rows($verifica);
    if ($linha > 0) {
        echo "Serviço já existente";
    } else {
        $query = "INSERT INTO occupation(name) values('".$occupation."')";
        $insert = mysqli_query($conn, $query);
        if($insert){
            echo "cadastrado com sucesso";
        }else{
            echo "erro ao cadastrar";
        }
    }