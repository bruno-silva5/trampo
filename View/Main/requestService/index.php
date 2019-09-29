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

    <!-- verify if there is occupation in URL  -->
    <?php
        if(!isset($_GET['occupation_subcategory'])) {
            header("Location: ../hire");
        }
    ?>

    <?php 
        $consulta = "SELECT * FROM user WHERE email = '".$_SESSION['email']."'";
        $res = mysqli_query($conn,$consulta);
        $row = mysqli_fetch_assoc($res);
    ?>

    <header>
        <nav class="nav-extended z-depth-0">
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
            <li id="li-hire" class="active"><a href="../hire" class="waves-effect"><i
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
            <div class="blue-background"></div>
            <div class="container z-depth-1">
                <form action="../../../Controller/cadastrarService.php" method="POST" class="row padding white"
                    id="form-requestService">
                    <a href="../hire" class="btn circle waves-effect waves-light hide-on-small-only"><i
                            class="material-icons">arrow_back</i></a>
                    <a href="../hire" class="btn-floating circle waves-effect waves-light hide-on-med-and-up"><i
                            class="material-icons">arrow_back</i></a>
                    <div class="col s12">
                        <h5 class="center-align">Descrever serviço</h5>
                    </div>
                    <!-- necessary to pass the id to the javascript -->
                    <input type="text" class="hide" id="id_occupation_subcategory" value="<?php echo $_GET['occupation_subcategory'] ?>">
                    <!-- get occupation name -->
                    <?php
                        $query = mysqli_query($conn, "SELECT name FROM occupation_subcategory WHERE id = '".$_GET['occupation_subcategory']."'");
                        $row = mysqli_fetch_assoc($query); 
                    ?>
                    <div class="input-field col s12">
                        <input disabled type="text" id="professional" value="<?php echo $row['name'] ?>">
                        <label for="professional">Serviço</label>
                    </div>
                    <div class="input-field col s12">
                        <select name="time-remaining" id="time-remaining">
                            <option value="now">O quanto antes</option>
                            <option value="next_week">A próxima semana</option>
                            <option value="two_weeks">Duas semanas</option>
                            <option value="no_forecast">Sem previsão</option>
                        </select>
                        <label>Para quando é o serviço?</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="service-title">
                        <label for="service-title">Título do serviço</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="service-description" class="materialize-textarea" data-length="200"
                            maxlength="200"></textarea>
                        <label for="service-description">Digite uma descrição do serviço</label>
                    </div>
                    <div class="col s12">
                        <h6 class="center-align"><strong>Quais os próximos passos?</strong></h6>
                    </div>
                    <div class="col s12 m6 step">
                        <div class="center-align">
                            <img src="../_img/icon/smartphone-text-icon.svg" alt="smartphone icon" width="70">
                            <h6 class="center-align">Logo abaixo, você pode escolher se deseja receber propostas para o seu serviço
                            </h6>
                        </div>
                    </div>
                    <div class="col s12 m6 step">
                        <div class="center-align">
                            <img src="../_img/icon/search-people.svg" alt="" width="70">
                            <h6 class="center-align">Em seguida, você verá profissionais qualificados para o seu serviço
                            </h6>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <p>
                            <label>
                                <input type="checkbox" id="visible-agreement"/>
                                <span class="black-text">Permitir que meu pedido seja visto por prestadores (Poderei
                                    receber até 3 mensagens)</span>
                            </label>
                        </p>
                    </div>
                    <div id="form-message"></div>
                    <div class="input-field col s12 right-align">
                        <button class="btn waves-effect waves-light" id="submit-requestService">Continuar</button>
                    </div>
                </form>

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

    <!-- Modal warning -->
    <div class="modal" id="modal-warning">
        <div class="modal-content">
            <h4 class="center-align">Cuidado!</h4>
            <div class="row center-align">
                <img src="../_img/icon/warning.svg" alt="warning icon" width="80">
                <h6>Não forneça informações pessoais, tais como seu <strong>telefone, Whatsapp ou e-mail</strong> para os profissionais. Para ter direito a garantia, é necessário que toda negociação fique registrado no chat do trampo</h6>
            </div>
            <div class="switch valign-wrapper">
                <label>
                    <input type="checkbox" id="warning-agreement">
                    <span class="lever"></span>
                </label>
                <span>Li, entendi e concordo</span>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect waves-light warning-btn disabled">Continuar</button>
        </div>
    </div>


    <script src="../_js/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../_js/bin/materialize.min.js"></script>
    <script type="text/javascript" src="../_js/bin/main.js"></script>
    <script type="text/javascript">
    //init warning modal

    var elem_modal_warning = document.querySelector('#modal-warning');
    var instance_modal_warning = M.Modal.init(elem_modal_warning, {
        dismissible: false
    });
    var btn_warning = document.querySelector(".warning-btn");
    var warning_agreement = document.querySelector("#warning-agreement");

    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            instance_modal_warning.open();
        }, 800);
    }, false);

    warning_agreement.addEventListener('click', function() {
        if(!warning_agreement.checked) {
            btn_warning.classList.toggle("disabled");
        } else {
            btn_warning.classList.toggle("disabled");
        }
    });

    </script>
</body>

</html>