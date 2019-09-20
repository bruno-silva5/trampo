<?php
require("../Dao/daoUser.php");
$daoUser = new daoUser();

require("../Model/User.php");
$user = new User();
require("verifica.php");

$user->setEmailAntigo($_SESSION['email']);

$user->setNome($_POST['name']);
$user->setEmail($_POST['email']);
$user->setCpf($_POST['cpf']);
$user->setSexo($_POST['gender']);
$data = $_POST['birthday'];
$data = implode("-", array_reverse(explode("/", $data)));
$user->setDataNasc(date('Y-d-m', strtotime($data)));
$user->setCep($_POST['cep']);
$user->setEstado($_POST['estados-brasil']);
$user->setRua($_POST['street']);
$user->setNumero($_POST['number']);
$user->setBairro($_POST['neighborhood']);
$user->setComplemento($_POST['complement']);
$user->setCelular($_POST['phone-number']);
//$user->setServico($_POST['profession']);   

$daoUser->editarUser($user);



?>