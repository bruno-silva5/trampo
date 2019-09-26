<?php

    class DaoService {
        public function cadastrarService(Service $service) {
            include 'conexao.php';
            $query = "INSERT INTO service(professional, time_remaining, title, description) 
            VALUES ('".$service->getProfessional()."', '".$service->getTimeRemaining()."','".$service->getTitle()."',
            '".$service->getDescription()."')";
            $insert = mysqli_query($conn, $query);
        }
    }

?>