<?php
    require("../Dao/daoPrestador.php");
    $daoPrestador = new daoPrestador();

    require("../Model/Prestador.php");
    $prestador = new Prestador();
    require("verifica.php");


    $prestador->setEmail($_SESSION['email']);
    $daoPrestador->excluirPrestador($prestador);