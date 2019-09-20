<?php
require("../Dao/daoUser.php");
$daoUser = new daoUser();

require("../Model/User.php");
$user = new User();

$user->setNome($_POST['name']);
$user->setEmail($_POST['email']);
$user->setCpf($_POST['cpf']);
$user->setSexo($_POST['gender']);
$data = $_POST['birthday'];
$user->setDataNasc(date('Y-d-m', strtotime($data)));
$user->setCep($_POST['cep']);
$user->setEstado($_POST['estados-brasil']);
$user->setRua($_POST['street']);
$user->setNumero($_POST['number']);
$user->setBairro($_POST['neighborhood']);
$user->setComplemento($_POST['complement']);
$user->setCelular($_POST['phone-number']);
//$user->setServico($_POST['profession']);
//$user->setCurriculo($_POST['curriculum']);
//$user->setDisponivel($_POST['option']);
$user->setSenha($_POST['password']);

$daoUser->cadastrarUser($user);

?>


