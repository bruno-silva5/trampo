<?php
    require '../Dao/conexao.php';
    require '../Model/ServiceRequest.php';
    require '../Dao/DaoServiceRequest.php';

    $dao_serviceRequest = new DaoServiceRequest();
    $model_serviceRequest = new ServiceRequest();

    if(($_GET['id_service'] && $_GET['id_user'] && $_POST['price'] && $_POST['description']) !== null) {
        $model_serviceRequest->setIdService($_GET['id_service']);
        $model_serviceRequest->setIdUser($_GET['id_user']);
        //replace mask comma for dot
        $model_serviceRequest->setPrice(str_replace(
            array('.',','),
            array('','.'),
            $_POST['price']));
        $model_serviceRequest->setDescription($_POST['description']);

        if(!$dao_serviceRequest->checkOverwrite($model_serviceRequest)) {
            $dao_serviceRequest->insertServiceRequest($model_serviceRequest);
        } else {
            $dao_serviceRequest->updateServiceRequest($model_serviceRequest);
        }
        header("Location: ../../View/Main/work");
    } else {
        header("Location: ../../View/Main/serviceProfile/?id_service=".$_GET['id_service']);
    }

?>