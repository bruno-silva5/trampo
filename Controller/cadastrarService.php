<?php
    session_start();

    require '../Dao/DaoService.php';
    require '../Model/Service.php';
    require '../Dao/conexao.php';

    $dao_service = new DaoService();
    $service = new Service();

    $error = false;

    $query = mysqli_query($conn, "SELECT id FROM user WHERE email = '".$_SESSION['email']."'");
    $row = mysqli_fetch_assoc($query);
    $id_user = $row['id'];

    if(isset($_POST['submit'])) {
        if(($_POST['id_occupation_subcategory'] && $_POST['time_remaining'] && $_POST['service_title'] && $_POST['service_description'])!= null) {
            $service->setIdOccupationSubcategory($_POST['id_occupation_subcategory']);
            $service->setTimeRemaining($_POST['time_remaining']);
            $service->setTitle($_POST['service_title']);
            $service->setDescription($_POST['service_description']);
            $service->setIsVisible($_POST['is_visible']);
            $service->setIdUser($id_user);
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
        $("#submit-requestService").addClass("disabled");
        setTimeout(function () {
            window.location.href = "../workerList";
        }, 600);
    }
</script>