<?php

    require("../Dao/daoContratante.php");
    $daoContratante = new daoContratante();

    require("../Dao/daoPrestador.php");
    $daoPrestador = new daoPrestador();

    $email = $_POST['email'];
    if ($daoContratante->verificaContaContratante($email) == "contratante" || $daoPrestador->verificaContaPrestador($_POST['email']) == "prestador") {
        $chave = sha1($email);
        $link = "http://localhost/trampo/View/NovaSenha/index.php?chave={$chave}";
        
        header("Location: {$link}");
    }else{
        echo "fueda";
    }