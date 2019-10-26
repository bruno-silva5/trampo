<?php
    require "../../../Controller/verifica.php";
    require '../../../Dao/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../_sass/materialize.css">
    <title>trampo</title>
</head>

<body>
    <?php 
        $consulta = "SELECT * FROM user WHERE email = '".$_SESSION['email']."'";
        $res = mysqli_query($conn,$consulta);
        $row = mysqli_fetch_assoc($res);
    ?>

    <header>
        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="#!" class="brand-logo center">Progresso</a>
            </div>
            <div class="nav-content">
                <!-- tab starts hidden -->
                <ul class="tabs tabs-transparent tabs-fixed-width">
                    <li class="tab"><a href="#hires" id="tab2" class="waves-effect waves-light">Contratos</a></li>
                    <li class="tab"><a href="#services" id="tab1" class="waves-effect waves-light">Serviços</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- padding top due the fixed navbar -->
    <main style="padding-top: 8em;">
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <h5 class="center-align blue-text ">trampo</h5>
            <li>
                <div class="user-view">
                    <a href="#user"><img class="circle z-depth-1" src="<?php echo $row['profile_picture']; ?>"
                            alt="user profile picture"></a>
                    <div class="user-info">
                        <a href="#name"><span class="black-text name"><?php echo $row['full_name'] ?></span></a>
                        <a href="#email"><span class="black-text email"><?php echo $row['email'] ?></span></a>
                    </div>
                </div>
            </li>
            <li class="active"><a href="" class="waves-effect"><i class="material-icons">cached</i>Em
                    progresso</a></li>
            <li><a href="../hire" class="waves-effect"><i class="material-icons">assignment_ind</i>Contratar</a></li>
            <li><a href="../work" class="waves-effect"><i class="material-icons">build</i>Trabalhar</a>
            </li>
            <li><a href="../chatList" class="waves-effect"><i class="material-icons">chat</i>Chat</a>
            </li>
            <li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Configurações</a></li>
            <li><a href="../myAccount" class="waves-effect">Minha conta</a></li>
            <li><a href="#!" class="waves-effect">Preferências</a>
            </li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#modalLeave" class="waves-effect modal-trigger"><i
                        class="material-icons">power_settings_new</i>Sair</a></li>
        </ul>


        <!-- Section progress and yours tabs -->
        <section class="section-progress">

            <div id="hires">
            
                <div class="wrapper-content">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM service WHERE service.id_user IN (SELECT id FROM user WHERE email LIKE '".$row['email']."')");
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)) {
                    ?>
                    
                    <div class="card hoverable col s12 m4 l3">
                        <a href="../serviceProfile/?occupation_subcategory=<?php echo $row['id_occupation_subcategory']?>&id_service=<?php echo $row['id'] ?>">
                            <div class="card-image">
                                <div class="title-over-image">
                                    <h5><?php echo $row['title'] ?> </h5>
                                </div>
                                <?php 
                                    if(!empty($row['picture'])) {
                                ?>
                                    <img src="<?php echo $row['picture'] ?>" alt="card-image">
                                <?php
                                    }
                                ?>
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator orange-text text-darken-4">Pendente <i class="material-icons md-18">schedule</i> <i class="material-icons right grey-text text-darken-3">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <div class="card-title">
                                <i class="material-icons right">close</i>
                            </div>
                            <span class="card-title">
                                <strong> <?php echo $row['title'] ?> </strong>
                            </span>
                            <p>
                                <?php echo $row['description'] ?>
                            </p>
                            <p><a href="../serviceProfile/?occupation_subcategory=<?php echo $row['id_occupation_subcategory']?>&id_service=<?php echo $row['id'] ?>" class="valign-wrapper">Ver mais <i class="material-icons">keyboard_arrow_right</i></a></p>
                        </div>
                    </div>
                    
                    <?php
                            }
                        }
                    ?>

                </div>
            </div>


            <div id="services">
                <!-- if there is no work -->
                <div class="container center-align no-work">
                    <div class="row">
                        <div class="col s12">
                            <img src="../_img/icon/dislike.svg" alt="dislike icon" width="130">
                        </div>
                        <div class="col s12">
                            <h4>Ops!</h4>
                            <h6>Você não tem nenhum serviço contratado. Clique na aba contratar<br> e comece a contratar
                                agora mesmo!</h6>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>
    <!-- Modal leave -->
    <div id="modalLeave" class="modal">
        <div class="modal-content">
            <h4 class="center-align">Deseja sair?</h4>
        </div>
        <div class="modal-footer">
            <a href="../../../Controller/logout.php" class="modal-close waves-effect btn-flat">Sim</a>
            <button class="modal-close waves-effect waves-light btn">Não</button>
        </div>
    </div>


    <script type="text/javascript" src="../_js/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../_js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../_js/bin/materialize.min.js"></script>
    <script type="text/javascript" src="../_js/bin/main.js"></script>
</body>

</html>