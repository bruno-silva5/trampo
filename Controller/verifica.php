<?php
    public function verificaSession(){
        session_start();
        $usuario = $_SESSION['usuario'];
        $senha = $_SESSION['senha'];
        
        if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
            header("Location: index.php");
        }
    }
    
?>