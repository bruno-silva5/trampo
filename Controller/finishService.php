<?php 
    require '../Dao/conexao.php';

    mysqli_query($conn, "UPDATE service SET service.who_finished = '".$_GET['id_user']."' WHERE service.id = '".$_GET['id_service']."'");
    setcookie("who_finish_service", true, time()+3600, '/');
    header("Location: ../../View/Main/serviceProfile/?occupation_subcategory=".$_GET['occupation_subcategory']."&id_service=".$_GET['id_service']);
?>