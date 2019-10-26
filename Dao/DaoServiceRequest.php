<?php 

    class DaoServiceRequest {
        public function insertServiceRequest(ServiceRequest $service_request) {
            include 'conexao.php';
            $query = mysqli_query($conn, "INSERT INTO service_request (id_service, id_user, price, description) 
            VALUES ('".$service_request->getIdService()."', '".$service_request->getIdUser()."', 
            '".$service_request->getPrice()."','".$service_request->getDescription()."')");
        }
    }

?>