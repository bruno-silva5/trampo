<?php
    require("../../../Controller/verifica.php");
    include_once '../../../Dao/conexao.php';
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
                <a href="#!" class="brand-logo center">Contratar</a>
                <ul class="right">
                    <li><a href="#modalChat" class="waves-effect waves-light modal-trigger"><i
                                class="material-icons">chat</i></a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- padding top due the fixed navbar -->
    <main style="padding-top: 4em;">
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
            <li id="li-progress"><a href="../" class="waves-effect"><i class="material-icons">cached</i>Em
                    progresso</a></li>
            <li id="li-hire" class="active"><a href="" class="waves-effect"><i
                        class="material-icons">assignment_ind</i>Contratar</a></li>
            <li id="li-work"><a href="../work" class="waves-effect"><i class="material-icons">build</i>Trabalhar</a>
            </li>
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

        <!-- Section HIRE and yours tabs -->

        <section class="section-hire">
            <div class="container">
                <div class="search-service">
                    <div class="row">
                        <form action="#" class="col s12" id="form-search">
                            <br>
                            <div class="row valign-wrapper">
                                <div class="input-field col s10 m6 offset-m3">
                                    <input placeholder="Digite o que procura" id="hire_search" type="text">
                                </div>
                                <a class="btn-floating waves-effect waves-light hide-on-med-and-up"><i
                                        class="material-icons">search</i></a>
                                <a class="btn-floating btn-large waves-effect waves-light hide-on-small-only"><i
                                        class="material-icons">search</i></a>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <h4 class="center-align hire-title">Serviços Populares</h4>
                    </div>
                    <div class="row popular-services">
                        <a href="../requestService?professional=Transitário%20de%20cargas">
                            <div class="col s12 m4 l4">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../_img/workers/fretes.webp" alt="card image">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title black-text">Fretes</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="../requestService?professional=Doceiro%20(exclusive%20no%20comércio%20ambulante)">
                            <div class="col s12 m4 l4">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../_img/workers/confeiteira.jpg" alt="card image">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title black-text">Confeitaria</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="../requestService?professional=Encanador%20de%20manutenção">
                            <div class="col s12 m4 l4">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../_img/workers/encanador.jpg" alt="card image">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title black-text">Encanador</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="../requestService?professional=Pedreiro%20de%20reforma%20geral">
                            <div class="col s12 m4 l4">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../_img/workers/pedreiro.jpg" alt="card image">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title black-text">Pedreiro</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="../requestService?professional=Eletricista%20auxiliar">
                            <div class="col s12 m4 l4">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../_img/workers/eletricista.jpg" alt="card image">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title black-text">Eletricista</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="">
                            <div class="col s12 m4 l4">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../_img/workers/mecanico.jpg" alt="card image">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title black-text">Mecânico</span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </a>

                    <div class="row result"></div>

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
            <a href="../../Controller/logout.php" class="modal-close waves-effect btn-flat">Sim</a>
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