<?php
require("../Dao/daoContratante.php");
$daoContratante = new daoContratante();

require("../Model/Contratante.php");
$contratante = new Contratante();
require("verifica.php");

$contratante->setSenhaAntiga($_POST['senha']);

$contratante->setEmail($_SESSION['email']);
$contratante->setSenha($_POST['senhaNova']);  

$daoContratante->editarSenhaCliente($contratante);



?>