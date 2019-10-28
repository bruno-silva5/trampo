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
            </div>
        </nav>
    </header>

    <!-- padding top due the fixed navbar -->
    <main style="padding-top: 4em;">
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
            <li><a href="../progress" class="waves-effect"><i class="material-icons">cached</i>Em
                    progresso</a></li>
            <li><a href="../hire" class="waves-effect"><i class="material-icons">assignment_ind</i>Contratar</a></li>
            <li class="active"><a href="../work" class="waves-effect"><i class="material-icons">build</i>Trabalhar</a>
            </li>
            <li>
            <li><a href="../chatList" class="waves-effect"><i class="material-icons">chat</i>Chat</a>
            </li>
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


        <!-- Section WORK -->
        <section class="section-work">
            <div class="row blue-background"></div>

            <?php
                $query = mysqli_query($conn, "SELECT id FROM user_occupation WHERE id_user = '".$row['id']."'");
                if(!mysqli_num_rows($query) > 0) {
            ?>
            <div class="row z-depth-3">
                <div class="become-worker">
                    <form class="row" id="form-becomeWorker" action="../../../Controller/becomeWorker.php"
                        method="POST">
                        <div class="col s12">
                            <h4 class="center-align hide-on-small-only">Tornar-se um prestador</h4>
                            <h5 class="center-align hide-on-med-and-up">Tornar-se um prestador</h5>
                        </div>
                        <div class="col s12">
                            <h6 class="center-align">Antes de tornar-se um prestador de serviços, conte-nos alguns
                                detalhes</h6>
                        </div>
                        <div class="input-field col s12"></div>
                        <div class="input-field col s12">
                            Atuo com/como:
                            <div class="input-field inline occupation-option">
                                <select multiple id="select-occupation">
                                    <?php
                                        $query = mysqli_query($conn, "SELECT * FROM occupation");
                                        while($row = mysqli_fetch_assoc($query)) {
                                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-field col s12">Dê uma descrição sobre seus serviços:</div>
                        <div class="input-field col s12">
                            <textarea class="materialize-textarea" id="work-info"></textarea>
                            <label for="work-info">Informações adicionais</label>
                        </div>
                        <div class="input-field col s12">
                            <p>
                                <label>
                                    <input type="checkbox" id="work-agreement">
                                    <span class="black-text">Estou ciente com os <a href="#">termos de política</a> da
                                        plataforma Trampo</span>
                                </label>
                            </p>
                        </div>
                        <div id="message-becomeWorker"></div>
                        <div class="col s12 m2 l3 offset-m9 offset-l9 right-align">
                            <button class="btn waves-effect waves-light" id="submit-becomeWorker">Continuar</button>
                        </div>
                    </form>
                </div>

                <?php
                } else {
                ?>

                <div class="row z-depth-2">
                    <h4 class="center-align hide-on-small-only">Recentes trabalhos</h4>
                    <h5 class="center-align hide-on-med-and-up">Recentes trabalhos</h5>

                    <!-- space -->
                    <div class="row"></div>

                    <div class="col s12 m4 l3">

                        <div class="card hoverable">
                            <a href="#!">
                                <div class="card-image waves-effect waves-light">
                                    <img src="../_img/icon/tools.png">
                                </div>
                            </a>
                            <div class="card-content">
                                <span class="card-title activator">Pedreiro<i
                                        class="material-icons right">keyboard_arrow_up</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                    parede toda detonada rapidao</span>
                                <p>Here is some more information about this product that is only revealed once clicked
                                    on.
                                </p>
                                <p><a href="#!">Ver mais > ></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m4 l3">

                        <div class="card hoverable">
                            <a href="#!">
                                <div class="card-image waves-effect waves-light">
                                    <img src="../_img/icon/tools.png">
                                </div>
                            </a>
                            <div class="card-content">
                                <span class="card-title activator">Pedreiro<i
                                        class="material-icons right">keyboard_arrow_up</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title"><i class="material-icons right">close</i>Rebocar
                                    parede toda detonada rapidao</span>
                                <p>Here is some more information about this product that is only revealed once clicked
                                    on.
                                </p>
                                <p><a href="#!">Ver mais > ></a></p>
                            </div>
                        </div>
                    </div>


                </div>

                <?php
                }
                ?>



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

    <div class="modal" id="modal_worker_tutorial">
        <div class="modal-content">
            <div class="row">
                <h4 class="center-align blue-text hide-on-small-only">Parabéns, agora você pode prestar seviços!</h4>
                <h5 class="center-align blue-text hide-on-med-and-up">Parabéns, agora você pode prestar seviços!</h5>
            </div>

            <div class="row justify-align">
                <h6>
                    Muito bem, mas antes de você começar a sua jornada como prestador de serviços
                    no trampo iremos lhe passar um breve tutorial, de como usar a plataforma de forma correta,
                    sem se prejudicar
                </h6>
            </div>
            <div class="row">
                <h5 class="center-align red-text">Atenção, aviso:</h5>
            </div>

            <div class="row center-align">
                <img src="../_img/icon/warning.png" alt="warning icon" width="100">
            </div>
            <div class="row">
                <h6 class="center-align">É de grande importância que você siga este passo-a-passo ao poderá ter futuros
                    problemas na plataforma!</h6>
            </div>
            <div class="divider"></div>
            <div class="row">
                <h5 class="blue-text">#Serviços disponíveis</h5>
            </div>
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <img src="../_img/print_screen_steps/test.png" class="materialboxed col s12">
                </div>
            </div>
            <div class="row">
                <h6 class="justify-align">Assim que você cadastrar os serviços que você realiza, você verá uma lista com
                    várias opções de pessoas que precisam os serviços na qual você faz. Basta escolher um, analisar o
                    serviço, e posteriormente mandar a sua proposta, caso seja de seu interesse. </h6>
            </div>
            <div class="row">
                <h5 class="blue-text">#Chat</h5>
            </div>
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <img src="../_img/print_screen_steps/test.png" class="materialboxed col s12">
                </div>
            </div>
            <div class="row">
                <h6 class="justify-align">
                    Fique atento a novas mensagens no seu chat, contratantes poderão entrar em contato com você através
                    dele. E após negociar, para poder acessar o serviço,
                    <span class="blue-text text-darken-4"><b>clique no nome do contratante</b></span>, assim você irá
                    ao perfil do mesmo, e logo sem seguida, escolha o serviço na qual pretende trabalhar, por fim, é só
                    mandar a proposta.
                </h6>
            </div>
            <div class="row">
                <h5 class="center-align red-text">Cuidado! Não realize um serviço sem registrar!</h5>
                <h6 class="justify-align">
                    Caso você realize um serviço combinado somente pelo chat e não o registrar,
                    não será possível obter avaliação, e o poderá ser prejudicado em futuras contratações.
                </h6>
            </div>
            <div class="row">
                <img src="../_img/icon/no-rate.png" alt="no rate icon">
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../_js/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../_js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../_js/bin/materialize.min.js"></script>
    <script type="text/javascript" src="../_js/bin/main.js"></script>
    <script type="text/javascript">
    var elem_modal_worker_tutorial = document.querySelector("#modal_worker_tutorial");
    var instance_modal_worker_tutorial = M.Modal.init(elem_modal_worker_tutorial, {
        dismissible: false
    });
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            instance_modal_worker_tutorial.open();
        }, 500);
    });
    </script>
</body>

</html>