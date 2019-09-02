<?php
    require("../Dao/daoContratante.php");
    $daoContratante = new daoContratante();

    require("../Model/Contratante.php");
    $contratante = new Contratante();
    require("verifica.php");


    $contratante->setEmail($_SESSION['email']);
    $daoContratante->excluirContratante($contratante);
