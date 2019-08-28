<?php
    require("../Dao/daoContratante.php");
    $daoContratante = new daoContratante();
    require("../Dao/daoPrestador.php");
    $daoPrestador = new daoPrestador();
    
    $email = $_POST['email'];
    if($daoContratante->verificaContaContratante($email) == "contratante"){
        require("../Model/Contratante.php");
        $contratante = new Contratante();
        
        $contratante->setEmail($_POST['email']);
        $contratante->setSenha($_POST['senha']);
        $daoContratante->logarUsuario($contratante);

    }else if($daoPrestador->verificaContaPrestador($_POST['email']) == "prestador"){
        require("../Model/Prestador.php");
        $prestador = new Prestador();
        
        $prestador->setEmail($_POST['email']);
        $prestador->setSenha($_POST['senha']);   
        $daoPrestador->logarPrestador($prestador);
    }else{
        header("Location: ../View/TelaErro/index.php");
    }