<?php

    class DaoService {
        public function cadastrarService(Service $service) {
            include 'conexao.php';
            $query = "INSERT INTO service(time_remaining, title, description, is_visible, id_occupation_subcategory, id_user) 
            VALUES ('".$service->getTimeRemaining()."','".$service->getTitle()."',
            '".$service->getDescription()."','".$service->getIsVisible()."', '".$service->getIdOccupationSubcategory()."', '".$service->getIdUser()."')";
            $insert = mysqli_query($conn, $query);
        }
    }

?>