<?php
require("../Dao/daoContratante.php");
$daoContratante = new daoContratante();

require("../Model/Contratante.php");
$contratante = new Contratante();
require("verifica.php");

$contratante->setEmailAntigo($_SESSION['email']);

$contratante->setNome($_POST['name']);
$contratante->setEmail($_POST['email']);
$contratante->setDataNasc("27/04/2002");
$contratante->setSexo($_POST['gender']);
$contratante->setCpf($_POST['cpf']);
$contratante->setCep($_POST['cep']);
$contratante->setEstado($_POST['estados-brasil']);
$contratante->setRua($_POST['street']);
$contratante->setBairro($_POST['neighborhood']);
$contratante->setNumero($_POST['number']);
$contratante->setComplemento($_POST['complement']);



$daoContratante->editarContratante($contratante);



