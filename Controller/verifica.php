<?php
        $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
        $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());

        session_start();
        $usuario = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
            header("Location: ../../../View/TelaLogin/index.html");
        }
?>
