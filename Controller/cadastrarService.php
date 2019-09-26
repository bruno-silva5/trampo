<?php

    require '../Dao/DaoService.php';
    require '../Model/Service.php';

    $dao_service = new DaoService();
    $service = new Service();

    $error = false;

    if(isset($_POST['submit'])) {
        if(($_POST['professional'] && $_POST['time_remaining'] && $_POST['service_title'] && $_POST['service_description'])!= null) {
            $service->setProfessional($_POST['professional']);
            $service->setTimeRemaining($_POST['time_remaining']);
            $service->setTitle($_POST['service_title']);
            $service->setDescription($_POST['service_description']);
            $dao_service->cadastrarService($service);
        } else {
            echo '<p class="red-text">É obrigatório preencher todos os campos</p>';
            $error = true;
        }
    }   

?>

<script>
    var error = "<?php echo $error; ?>";
    if(!error) {
        M.toast({html: 'Serviço cadastrado!'});
        $("#service-title, #service-description").val("");
        setTimeout(function () {
            window.location.href = "../workerList";
        }, 1000);
    }
</script>