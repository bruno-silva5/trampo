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
                <ul class="right">
                    <li><a href="#modalChat" class="waves-effect waves-light modal-trigger"><i
                                class="material-icons">chat</i></a></li>
                </ul>
            </div>
            <div class="nav-content">
                <!-- tab starts hidden -->
                <ul class="tabs tabs-transparent tabs-fixed-width">
                    <li class="tab"><a href="#hires" id="tab2">Contratos</a></li>
                    <li class="tab"><a href="#services" id="tab1">Serviços</a></li>
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
                    <a href="#user"><img class="circle z-depth-1" src="../_img/user.svg" alt="user profile picture"></a>
                    <div class="user-info">
                        <a href="#name"><span class="black-text name"><?php echo $row['full_name'] ?></span></a>
                        <a href="#email"><span class="black-text email"><?php echo $row['email'] ?></span></a>
                    </div>
                </div>
            </li>
            <li id="li-progress" class="active"><a href="" class="waves-effect"><i class="material-icons">cached</i>Em
                    progresso</a></li>
            <li id="li-hire"><a href="../hire" class="waves-effect"><i
                        class="material-icons">assignment_ind</i>Contratar</a></li>
            <li id="li-work"><a href="../work" class="waves-effect"><i class="material-icons">build</i>Trabalhar</a></li>
            <li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Configurações</a></li>
            <li id="li-myAccount"><a href="../myAccount" class="waves-effect">Minha conta</a></li>
            <li id="li-preferences"><a href="#!" class="waves-effect">Preferências</a>
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
                <!-- if there is no hire -->
                

                <?php
                    $query = mysqli_query($conn, "SELECT id FROM user WHERE email = '".$_SESSION['email']."'");
                    $row = mysqli_fetch_assoc($query);
                    $id_user = $row['id'];
                    $query = mysqli_query($conn, "SELECT * FROM service WHERE id_user = '".$id_user."'");
                    $rows = mysqli_fetch_assoc($query);
                    if($rows > 0) {
                        echo '
                    <div class="wrapper-content">
                        <div class="row">
    
                            <div class="col s12 m4 l3">
    
                                <div class="card hoverable">
                                    <a href="#!">
                                        <div class="card-image waves-effect waves-light">
                                            <img src="../_img/icon/tools.png">
                                        </div>
                                    </a>
                                    <div class="card-content">
                                        <span class="card-title activator">João<i
                                                class="material-icons right">keyboard_arrow_up</i></span>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title"><i class="material-icons right">close</i>
                                        '.$rows['title'].'
                                        <p>'.$rows['description'].'
                                        </p>
                                        <p><a href="#!">Ver mais > ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    } else {
                        echo '
                    <div class="container center-align no-hire">
                        <div class="row">
                            <div class="col s12">
                                <img src="../_img/icon/dislike.svg" alt="dislike icon" width="130">
                            </div>
                            <div class="col s12">
                                <h4>Ops!</h4>
                                <h6>Você não tem nenhum serviço contratado. Clique na aba <strong>Contratar</strong><br> e
                                    comece a contratar
                                    agora mesmo!</h6>
                            </div>
                        </div>
                    </div>';
                    }
                ?>
                <!-- if there is hire -->
                

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

    <!-- Modal chat -->
    <div class="modal" id="modalChat">
        <div class="modal-content">
            <div class="conversations">
                <div class="boxConversation">
                    <img src="../_img/user.svg" alt="" width="70" class="circle">
                    <div>
                        <h6>Fulano de tal</h6>
                        <p>Lorem ipsum dolor sit amet </p>
                    </div>
                </div>

                <div class="boxConversation">
                    <img src="../_img/user.svg" alt="" width="70" class="circle">
                    <div>
                        <h6>Fulano de tal</h6>
                        <p>Lorem ipsum dolor sit amet </p>
                    </div>
                </div>

                <div class="boxConversation">
                    <img src="../_img/user.svg" alt="" width="70" class="circle">
                    <div>
                        <h6>Fulano de tal</h6>
                        <p>Lorem ipsum dolor sit amet </p>
                    </div>
                </div>
            </div>
            <div class="conversation">
                <div class="header">
                    <h4>Fulano de tal - servio de tal coisa</h4>
                </div>
                <div class="conversation-content">

                </div>
                <div class="send-message">

                </div>
            </div>
        </div>
    </div>

    <script src="../_js/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../_js/bin/materialize.min.js"></script>
    <script type="text/javascript" src="../_js/bin/main.js"></script>
</body>

</html>