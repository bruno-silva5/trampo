<?php
    require '../Dao/conexao.php';

    mysqli_query($conn, "DELETE FROM service_request WHERE id = '".$_GET['id_service_request']."'");
    header("Location: ../View/Main/serviceProfile/?occupation_subcategory=".$_GET['occupation_subcategory']."&id_service=".$_GET['id_service']);

?>