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
        $id_user = $row['id'];
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
            <li class="active"><a href="../progress" class="waves-effect"><i class="material-icons">cached</i>Em
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


        <section class="section-hire">
            <div class="blue-background"></div>
            <div class="z-depth-1 padding container-extended">
                <a href="../progress/" class="btn circle waves-effect waves-light hide-on-small-only"><i
                        class="material-icons">arrow_back</i></a>
                <a href="../progress/" class="btn-floating circle waves-effect waves-light hide-on-med-and-up"><i
                        class="material-icons">arrow_back</i></a>

                <?php
                    $query = mysqli_query($conn, "SELECT service.id, service.description, service.title, service.id_user, service.picture, occupation.name, user.full_name FROM `service` 
                    INNER JOIN occupation_subcategory
                    ON service.id_occupation_subcategory = occupation_subcategory.id
                    INNER JOIN occupation ON occupation_subcategory.id_occupation = occupation.id 
                    INNER JOIN user ON service.id_user = user.id
                    WHERE service.id = '".$_GET['id_service']."'");
                    $row = mysqli_fetch_assoc($query);
                ?>
                <h5 class="center-align"><strong>Detalhes do serviço</strong></h5>
                <div class="divider"></div>
                <div class="row center-align" style="padding: 2em 2em 1em">

                    <img src="<?php echo(!empty($row['picture']))?$row['picture']:'../_img/icon/no_service_image.png'; ?>"
                        alt="service picture" height="230" class="<?php echo(!empty($row['picture'])?'z-depth-3':'') ?>"
                        style="width:100%; max-width:230px; object-fit:cover">
                    <h5><?php echo $row['title']; ?></h5>
                    <div class="divider" style="margin-bottom:1em"></div>
                    <div class="col s12">
                        <p><strong>Informações do serviço</strong></p>
                    </div>
                    <div class="col s12 m2 left-align">
                        <p><strong>Descrição: </strong></p>
                    </div>
                    <div class="col s12 m10 left-align">
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <div class="col s12 m2 left-align">
                        <p><strong>Categoria: </strong></p>
                    </div>
                    <div class="col s12 m10 left-align">
                        <p><?php echo $row['name']; ?></p>
                    </div>
                    <div class="col s12 m2 left-align">
                        <p><strong>Contratante: </strong></p>
                    </div>
                    <div class="col s12 m10 left-align">
                        <p><?php echo $row['full_name']; ?></p>
                    </div>
                </div>
                <div class="divider"></div>

                <?php 
                     if($row['id_user'] == $id_user) {
                        $query = mysqli_query($conn, "SELECT service_request.*, user.full_name, user.id id_user, user.profile_picture FROM `service_request` 
                        INNER JOIN user ON service_request.id_user = user.id
                        WHERE service_request.id IN (SELECT MAX(id) FROM service_request WHERE id_service = '".$row['id']."' GROUP BY id_user) ORDER BY service_request.id DESC");
                        if(mysqli_num_rows($query) > 0) {
                ?>
                <div class="row">
                    <p class="center-align"><strong>Solicitações de trabalho</strong></p>
                </div>
                <?php
                            while($row = mysqli_fetch_assoc($query)) {
                ?>

                <div class="row valign-wrapper z-depth-1" style="flex-wrap: wrap; padding:1.3em; border-radius:0.2em">
                    <a href="../workerProfile/?id_user=<?php echo $row['id_user'] ?>"
                        class="col s12 m12 l3 center-align">
                        <img src="<?php echo $row['profile_picture'] ?>" alt="user profile" class="circle z-depth-2"
                            width="100" height="100" style="object-fit:cover">
                        <h6><?php echo $row['full_name'] ?></h6>
                    </a>
                    <div class="col s12 m12 l3 center-align">
                        <p><?php echo $row['description'] ?></p>
                    </div>
                    <div class="col s12 m12 l3 center-align">
                        <h5>R$ <?php echo(str_replace(".",",",$row['price'])) ?></h5>
                    </div>
                    <div class="col s12 m12 l3 center-align">
                        <a href="#!" class="btn waves-effect waves-light"><i class="material-icons">chat</i></a>
                        <!-- talk to the worker-->
                        <a href="#!" class="btn green waves-effect"><i class="material-icons">done</i></a>
                        <!-- accept service-->
                        <a href="#modal-dismiss-service" class="btn red waves-effect modal-trigger"
                            onclick="delete_service_request(<?php echo $row['id'] ?>, <?php echo $_GET['id_service']?>, <?php echo $_GET['occupation_subcategory'] ?>)"><i
                                class="material-icons">clear</i></a><!-- dismiss service-->
                    </div>
                </div>
                <?php
                            }
                        }else {
                ?>
                <div class="row">
                    <p class="center-align"><strong>Solicitações de trabalho</strong></p>
                </div>
                <div class="row">
                    <h6 class="center-align">Não há solicitações para seu serviço!</h6>
                </div>

                <?php
                        }
                ?>
                <div class="row right-align" style="margin-top:4em">
                    <button class="btn-flat">Editar serviço</button>
                    <a href="../workerList/?occupation_subcategory=<?php echo $_GET['occupation_subcategory']?>&id_service=<?php echo $_GET['id_service']; ?>"
                        class="btn waves-effect waves-light">Procurar por prestadores</a>
                </div>
                <?php
                    } else {
                        //check if the user can do the job/ is worker
                        $query = mysqli_query($conn, "SELECT id FROM user_occupation WHERE id_user = '".$id_user."'");
                        if(mysqli_num_rows($query) > 0) {
                            $query = mysqli_query($conn, "SELECT service_request.*, user.full_name, user.id id_user, user.profile_picture 
                            FROM `service_request` 
                            INNER JOIN user ON service_request.id_user = user.id
                            WHERE service_request.id_service = '".$_GET['id_service']."' AND service_request.id_user = '".$id_user."'
                            ");
                            if(mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                ?>
                <div class="row">
                    <h5 class="center-align blue-text">Minha atual proposta</h5>
                </div>
                <div class="row valign-wrapper z-depth-1" style="flex-wrap: wrap; padding:1.3em; border-radius:0.2em">
                    <a href="../workerProfile/?id_user=<?php echo $row['id_user'] ?>"
                        class="col s12 m12 l3 center-align">
                        <img src="<?php echo $row['profile_picture'] ?>" alt="user profile" class="circle z-depth-2"
                            width="100" height="100" style="object-fit:cover">
                        <h6><?php echo $row['full_name'] ?></h6>
                    </a>
                    <div class="col s12 m12 l3 center-align">
                        <p><?php echo $row['description'] ?></p>
                    </div>
                    <div class="col s12 m12 l3 center-align">
                        <h5>R$ <?php echo(str_replace(".",",",$row['price'])) ?></h5>
                    </div>
                    <div class="col s12 m12 l3 center-align">
                        <a href="#modal-dismiss-service" class="btn red waves-effect modal-trigger"
                            onclick="delete_service_request(<?php echo $row['id'] ?>, <?php echo $_GET['id_service']?>, <?php echo $_GET['occupation_subcategory'] ?>)"><i
                                class="material-icons">clear</i></a><!-- dismiss service-->
                    </div>
                </div>
                <?php
                            } 
                ?>
                <div class="row">
                    <h5 class="center-align blue-text"><strong>Oferecer nova proposta</strong></h5>
                </div>
                <form
                    action="../../../Controller/insertServiceRequest.php/?id_service=<?php echo $_GET['id_service'] ?>&id_user=<?php echo $id_user ?>"
                    method="POST" class="row">
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix">create</i>
                        <textarea class="materialize-textarea" data-length="200" maxlength="200"
                            id="service_request_description" name="description" required></textarea>
                        <label for="service_request_description">Proposta de serviço</label>
                    </div>
                    <div class="input-field col s12 m3">
                        <i class="material-icons prefix">attach_money</i>
                        <input type="text" id="service_request_price" name="price" placeholder="320,00" required>
                        <label for="service_request_price">Preço R$</label>
                    </div>
                    <div class="input-field col s12 right-align">
                        <button type="submit" class="btn waves-effect waves-light">Oferecer serviço</button>
                    </div>
                </form>
                <?php
                        } else {
                ?>
                <div class="row">
                    <h5 class="center-align blue-text"><strong>Oferecer serviço</strong></h5>
                </div>
                <div class="row">
                    <h6 class="center-align">Você não pode prestar serviço, pois ainda não é prestador</h6>
                </div>
                <?php
                    }
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

    <!-- Modal accept service -->
    <div class="modal" id="modal-accept-service">
        <div class="modal-content">
            <h4 class="center-align">Tem certeza?</h4>
            <p>Clicando em aceitar, você irá <b>contratar</b> o prestador! </p>
        </div>
        <div class="modal-footer">

        </div>
    </div>

    <!-- Modal dismiss service -->
    <div class="modal" id="modal-dismiss-service">
        <div class="modal-content">
            <h4 class="center-align">Tem certeza?</h4>
            <p class="center-align">Clicando em excluir a proposta, você não poderá vê-la novamente!</p>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col s6 center-align"><button class="btn-flat modal-close">Cancelar</button></div>
                <div class="col s6 center-align"><a href="#!" id="delete-service-request"
                        class="btn waves-effect red">Excluir</a></div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="../_js/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../_js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../_js/bin/materialize.min.js"></script>
    <script type="text/javascript" src="../_js/bin/main.js"></script>
</body>

</html>