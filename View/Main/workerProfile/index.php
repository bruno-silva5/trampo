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
                <a href="#!" class="brand-logo center">Contratar</a>
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
            <li class="active"><a href="../hire" class="waves-effect"><i
                        class="material-icons">assignment_ind</i>Contratar</a></li>
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

        <!-- Section HIRE and yours tabs -->

        <section class="section-hire">
            <div class="blue-background"></div>
            <div class="z-depth-1 padding container-extended">
                <a href="../workerList/?occupation_subcategory=<?php echo $_GET['occupation_subcategory'] ?>&id_service=<?php echo $_GET['id_service'] ?>"
                    class="btn circle waves-effect waves-light hide-on-small-only"><i
                        class="material-icons">arrow_back</i></a>
                <a href="../workerList/?occupation_subcategory=<?php echo $_GET['occupation_subcategory'] ?>&id_service=<?php echo $_GET['id_service'] ?>"
                    class="btn-floating circle waves-effect waves-light hide-on-med-and-up"><i
                        class="material-icons">arrow_back</i></a>

                <?php
                    $query = mysqli_query($conn, "SELECT * FROM user WHERE user.id = '".$_GET['id_user']."'");
                    $row_worker = mysqli_fetch_assoc($query);
                ?>
                <h5 class="center-align"><strong>Perfil do prestador</strong></h5>
                <div class="row">
                    <div class="divider"></div>
                </div>
                <div class="row" style="max-width:900px">
                    <div class="col s12 m4 center-align">
                        <img src="<?php echo $row_worker['profile_picture']; ?>" style="object-fit:cover"
                            class="z-depth-3 circle" height="200" width="200">
                    </div>
                    <div class="col s12 m7 offset-m1">
                        <h5><?php echo $row_worker['full_name']; ?></h5>
                        <h6><b>Avaliação:</b> 22</h6>
                        <h6><b>Localização:</b> <?php echo $row_worker['city'] ?></h6>
                        <button class="btn" style="margin-top:2em"><i class="material-icons right">chat</i>Entrar em contato</button>
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