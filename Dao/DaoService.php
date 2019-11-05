<?php

    class DaoService {
        public function cadastrarService(Service $service) {
            include 'conexao.php';
            
            //check if there is a image for the service, otherwise, it will have a default image on database   
            if(!empty($service->getPicture())) {
                $query = "INSERT INTO service(time_remaining, title, description, picture, is_visible, id_occupation_subcategory, id_user, status) 
                VALUES ('".$service->getTimeRemaining()."','".$service->getTitle()."',
                '".$service->getDescription()."','".$service->getPicture()."','".$service->getIsVisible()."', '".$service->getIdOccupationSubcategory()."', '".$service->getIdUser()."', '".$service->getStatus()."')";      
            } else {
                $query = "INSERT INTO service(time_remaining, title, description, is_visible, id_occupation_subcategory, id_user, status) 
                VALUES ('".$service->getTimeRemaining()."','".$service->getTitle()."',
                '".$service->getDescription()."','".$service->getIsVisible()."', '".$service->getIdOccupationSubcategory()."', '".$service->getIdUser()."', '".$service->getStatus()."')";
            }
            $insert = mysqli_query($conn, $query);
        }

        public function getLastRegisteredId() {
            include 'conexao.php';
            $last_id = mysqli_query($conn, "SELECT MAX(id) FROM service");
            return mysqli_fetch_assoc($last_id);
        }

    }

?>