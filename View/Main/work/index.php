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
        <nav class="nav-extended z-depth-0">
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="#!" class="brand-logo center">Trabalhar</a>
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
            <li id="li-progress"><a href="../" class="waves-effect"><i
                        class="material-icons">cached</i>Em
                    progresso</a></li>
            <li id="li-hire"><a href="../hire" class="waves-effect"><i
                        class="material-icons">assignment_ind</i>Contratar</a></li>
            <li id="li-work" class="active"><a href="../work" class="waves-effect"><i
                        class="material-icons">build</i>Trabalhar</a></li>
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


        <!-- Section WORK -->
        <section class="section-work">
            <div class="row blue-background"></div>
            <div class="row z-depth-3">

                <!-- if it's missing dates -->
                <!-- <div class="become-worker">
                    <form class="row">
                        <div class="col s12">
                            <h4 class="center-align hide-on-small-only">Tornar-se um prestador</h4>
                            <h5 class="center-align hide-on-med-and-up">Tornar-se um prestador</h5>
                        </div>
                        <div class="col s12">
                            <h6 class="center-align">Para tornar-se um prestador de serviços, você preencher alguns
                                campos antes</h6>
                        </div>
                        <div class="input-field col s12"></div>
                        <div class="input-field col s12">
                            Eu sou:
                            <div class="input-field inline">
                                <input type="text" class="center-align"
                                    placeholder="Digite e pressione enter para adiconar" size="30">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <p>
                                Disponível para vagas de emprego:
                                <label>
                                    <input class="with-gap" name="available_job" type="radio" value="yes" checked>
                                    <span>Sim</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input class="with-gap" name="available_job" value="no" type="radio">
                                    <span>Não</span>
                                </label>
                            </p>
                        </div>
                        <div class="col s12 m2 l3 offset-m9 offset-l9 center-align">
                            <button class="btn waves-effect waves-light">Continuar</button>
                        </div>

                    </form>
                </div> -->


                <!-- showing the works -->
                <!-- <h4 class="center-align hide-on-small-only">Recentes trabalhos</h4>
                <h5 class="center-align hide-on-med-and-up">Recentes trabalhos</h5>
                <div class="divider"></div>
                <div class="card-flexWrapper">
                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>

                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>

                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>

                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>

                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>

                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>

                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>

                    <div class="card hoverable">
                        <a href="#!">
                            <div class="card-image waves-effect  waves-light">
                                <img src="../_img/office.jpg">
                            </div>
                        </a>
                        <div class="card-content">
                            <span class="card-title activator">Pedreiro<i
                                    class="material-icons right">keyboard_arrow_up</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                parede toda detonada rapidao</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.
                            </p>
                            <p><a href="#!">Ver mais > ></a></p>
                        </div>
                    </div>
                </div> -->


                <!-- showing the work -->
                <!-- <h4 class="center-align hide-on-small-only">Nome do trabalho</h4>
                <h5 class="center-align hide-on-med-and-up">Nome do trabalho</h5>
                <div class="work-info">
                    <div class="work-img">
                        <img src="../_img/user.svg" alt="service picture" width="250">
                    </div>
                    <h6><strong>Nome do contratante</strong></h6>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente illo maxime nisi ullam illum
                        molestiae esse quam officia obcaecati nobis.</p>
                    <h5>2.2 KM distante</h5>
                    <a href="#modalChat" class="btn waves-effect waves-light modal-trigger">Entrar em contato</a>
                </div> -->

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