<?php
require("../Dao/daoPrestador.php");
$daoPrestador = new daoPrestador();

require("../Model/Prestador.php");
$prestador = new Prestador();

$prestador->setNome($_POST['name']);
$prestador->setEmail($_POST['email']);
$prestador->setCpf($_POST['cpf']);
$prestador->setSexo($_POST['gender']);
$prestador->setDataNasc("27/04/2002");
$prestador->setCep($_POST['cep']);
$prestador->setEstado($_POST['estados-brasil']);
$prestador->setRua($_POST['street']);
$prestador->setNumero($_POST['number']);
$prestador->setBairro($_POST['neighborhood']);
$prestador->setComplemento($_POST['complement']);
$prestador->setServico($_POST['profession']);
$prestador->setCurriculo($_POST['curriculum']);
$prestador->setDisponivel($_POST['option']);
$prestador->setSenha($_POST['password']);

$daoPrestador->cadastrarPrestador($prestador);

?>


