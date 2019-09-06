<?php
    require "../Dao/daoPrestador.php";
    $daoPrestador = new daoPrestador();

    require "../Dao/daoContratante.php";
    $daoContratante = new daoContratante();

    $chave = $_POST['chave'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    if($chave == sha1($email)){
        if($daoContratante->verificaContaContratante($email) == "contratante"){
            require("../Model/Contratante.php");
            $contratante = new Contratante();
            
            $contratante->setEmail($email);
            $contratante->setSenha($senha);
            $daoContratante->redefinirSenha($contratante);
    
        }else if($daoPrestador->verificaContaPrestador($email) == "prestador"){
            require("../Model/Prestador.php");
            $prestador = new Prestador();
            
            $prestador->setEmail($email);
            $prestador->setSenha($senha);   
            $daoPrestador->redefinirSenha($prestador);
        }else{
            header("Location: ../View/TelaErro/index.php");
        }
    }