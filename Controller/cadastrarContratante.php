<?php
    require("../Dao/daoContratante.php");
    $daoContratante = new daoContratante();

    require("../Model/Contratante.php");
    $contratante = new Contratante();

    $contratante->setNome($_POST['name']);
    $contratante->setEmail($_POST['email-input']);
    $contratante->setSenha( $_POST['input-password']);
    $data = date('d-m-Y');
    $data = $_POST['birthday'];
    $contratante->setDataNasc(date('Y-d-m', strtotime($data)));
    $contratante->setSexo($_POST['gender']);
    $contratante->setCPF($_POST['cpf-input']);
    $contratante->setCEP($_POST['input-cep']);
    $contratante->setEstado($_POST['estados-brasil']);
    $contratante->setCidade("");
    $contratante->setRua($_POST['input-street']);
    $contratante->setBairro($_POST['input-neighborhood']);
    $contratante->setNumero($_POST['input-number']);
    $contratante->setComplemento($_POST['input-complement']);
    $daoContratante->cadastrarUsuario($contratante);

?>