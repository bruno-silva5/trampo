<?php
    $email = $_GET['email'];
    $senha = $_GET['password'];

    require("../Dao/daoContratante.php");
    $daoContratante = new daoContratante();
    require("../Dao/daoPrestador.php");
    $daoPrestador = new daoPrestador();
    
    if($daoContratante->verificaContaContratante($email) == "contratante"){
        require("../Model/Contratante.php");
        $contratante = new Contratante();
        
        $daoContratante->alteraSenha($email, $senha);
    }else{
        header("Location: ../View/TelaErro/index.html");
    }