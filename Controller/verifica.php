<?php
        $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error($conn));
        $db = mysqli_select_db($conn, "bdtrampo") or die(mysqli_error($conn));

        session_start();
        $usuario = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
            header("Location: ../../../View/TelaLogin/index.html");
        }
?>
