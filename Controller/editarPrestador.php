<?php
require("../Dao/daoPrestador.php");
$daoPrestador = new daoPrestador();

require("../Model/Prestador.php");
$prestador = new Prestador();
require("verifica.php");

$prestador->setEmailAntigo($_SESSION['email']);

$prestador->setNome($_POST['name']);
$prestador->setEmail($_POST['email']);
$prestador->setCpf($_POST['cpf']);
$prestador->setSexo($_POST['gender']);
$data = $_POST['birthday'];
$data = implode("-", array_reverse(explode("/", $data)));
$prestador->setDataNasc(date('Y-d-m', strtotime($data)));
$prestador->setCep($_POST['cep']);
$prestador->setEstado($_POST['estados-brasil']);
$prestador->setRua($_POST['street']);
$prestador->setNumero($_POST['number']);
$prestador->setBairro($_POST['neighborhood']);
$prestador->setComplemento($_POST['complement']);
$prestador->setServico($_POST['profession']);   

$daoPrestador->editarPrestador($prestador);



?>