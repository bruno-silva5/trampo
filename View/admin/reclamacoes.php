<?php
    require "../../Controller/verifica.php";
    require '../../Dao/conexao.php';

    //select do usuario
    $consulta = "SELECT * FROM user WHERE email = '".$_SESSION['email']."'";
    $res = mysqli_query($conn,$consulta);
    $row = mysqli_fetch_assoc($res);
    $email = $row['email'];
    $nome = $row['full_name'];

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="_sass/materialize.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>trampo</title>

    <style>
        .card-content {
            padding: 5px;
            margin-bottom: 10px;
        }

        .container-adm {
            margin-right: 20px;
        }

        @media(min-width:991px) {
            .container-adm {

                float: right;
            }
        }

        @media(max-width:1050px) {
            .container-adm {

                margin-right: auto;
            }
        }

    </style>

</head>

<body>

    <header>
        <nav class="nav-extended" style="background:#1ac3b2;">
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="#!" class="brand-logo center">Reclamações</a>
            </div>
        </nav>
    </header>
    <!-- MENU -->
    <main style="padding-top: 4em;">
        <ul id="slide-out" class="sidenav sidenav-fixed darken-1" style="background:#1ac3b2;">
            <h5 class="center-align white-text ">TRAMPO</h5>
            <li>
                <div class="user-view">
                    <a href="#user"><img class="circle z-depth-1" src="_img/user.png" alt="user profile picture"></a>
                    <div class="user-info">
                        <a href="#name"><span class="white-text name"><?=$nome?></span></a>
                        <a href="#email"><span class="white-text email"><?=$email?></span></a>
                    </div>
                </div>
            </li>
          
            <li><a href="tela_adm.php" class="waves-effect white-text"><i class="material-icons white-text">new_releases</i>Dashboard</a>
            </li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#modalLeave" class="waves-effect modal-trigger white-text"><i class="material-icons white-text">power_settings_new</i>Sair</a></li>
        </ul>
    </main>
    <div id="modalLeave" class="modal">
        <div class="modal-content">
            <h4 class="center-align">Deseja sair?</h4>
        </div>
        <div class="modal-footer">
            <a href="" class="modal-close waves-effect btn-flat">Sim</a>
            <button style="background:#1ac3b2;" class="modal-close waves-effect waves-light btn">Não</button>
        </div>
    </div>

    <!-- Visao Geral -->
    <div class="row">
        <div class="container container-adm">

        </div>
            
    </div>
    <!---->
    <script src="_js/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="_js/bin/materialize.min.js"></script>
    <script type="text/javascript" src="_js/bin/main.js"></script>
    <script src="_js/Chart.min.js"></script>

   
</body>

</html>
