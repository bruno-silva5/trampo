<?php
    require("../../../Controller/verifica.php");
    include_once '../../../Dao/conexao.php';
    $service_register = false;
        if(isset($_COOKIE["form_submitted"])) {
            $service_register = true;
            setcookie("form_submitted", false, time()+3600, '/');
        }
        $list = [];

        
            
        if (isset($_GET['range'])) {
            $distancia = $_GET['range'];
        } else {
            $distancia = 15;
        }
        
        if (isset($_GET['select'])) {
            $filtro = $_GET['select'];
        } else {
            $filtro = "menorD";
        }

        echo $distancia;
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
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Configurações</a></li>
            <li><a href="../myAccount" class="waves-effect">Minha conta</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#modalLeave" class="waves-effect modal-trigger"><i
                        class="material-icons">power_settings_new</i>Sair</a></li>
        </ul>

        <!-- Section HIRE and yours tabs -->

        <section class="section-hire">
            <div class="blue-background"></div>
            <div class="z-depth-1 container-extended padding">
                <h5 class="center-align">Lista de prestadores para seu serviço</h5>
                <h6 class="center-align grey-text">Prestadores disponíveis próximo de você</h6>
                <div class="row">
                    <div class="col s12">
                        <ul class="collapsible z-depth-0">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">search</i>Filtros de busca
                                </div>
                                <div class="collapsible-body">
                                    <form method="GET" action="index.php">
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <h6><strong>Formas de pagamento</strong></h6>
                                            <div class="switch">
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="lever"></span>
                                                    <span class="switch-description">Cartão de cŕedito</span>
                                                </label>
                                            </div>
                                            <div class="switch">
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="lever"></span>
                                                    <span class="switch-description">Cartão de débito</span>
                                                </label>
                                            </div>
                                            <div class="switch">
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="lever"></span>
                                                    <span class="switch-description">Boleto</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col s12 m6">
                                            <h6><strong>Ordenar por</strong></h6>
                                            <select name = "select">
                                                <option value="menorD" <?=($filtro == 'menorD')?'selected':''?>>Menor distância</option>
                                                <option value="maiorD" <?=($filtro == 'maiorD')?'selected':''?>>Maior distância</option>
                                                <option value="maiorA" <?=($filtro == 'maiorA')?'selected':''?>>Maior Avaliação</option>
                                                <option value="menorA" <?=($filtro == 'menorA')?'selected':''?>>Menor Avaliação</option>
                                            </select>
                                        </div>
                                        <div class="col s12">
                                            <h6 class="center-align"><strong>Distância (KM)</strong></h6>
                                            <p class="range-field">
                                                <input type="range" name="range" min="0" max="30" value="<?=$distancia?>">
                                            </p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="occupation_subcategory" value="<?=$_GET['occupation_subcategory']?>">
                                    <input type="hidden" name="id_service" value="<?=$_GET['id_service']?>">
                                    <input type="submit" name="Filtrar">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="list center-align">

                    <?php
                        include "../../../Model/Filter.php";
                        $f = new Filter();
                        //lat e long da session
                        
                        $query = mysqli_query($conn,"SELECT lat, lon FROM user WHERE email = '".$_SESSION['email']."'");
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)) {
                                $origem = [
                                    'lat' => $row['lat'],
                                    'lon' => $row['lon']
                                ];
                            }
                        }
                        //select the users that can do the job
                        $query = mysqli_query($conn, 
                        "SELECT * FROM user WHERE user.id IN 
                        (SELECT user_occupation.id_user FROM user_occupation WHERE user_occupation.id_occupation IN
                        (SELECT occupation.id FROM occupation WHERE occupation.id IN 
                        (SELECT occupation_subcategory.id_occupation FROM occupation_subcategory 
                        WHERE occupation_subcategory.id = '".$_GET['occupation_subcategory']."'))) AND user.id != '".$row['id']."'");
                        
                        //count the numbers of workers that can do the job
                        $count_workers = 0;
                        while($row_worker = mysqli_fetch_assoc($query)) {
                            $destino = [
                                'lat' => $row_worker['lat'],
                                'lon' => $row_worker['lon']
                            ];
                            if($f->haversine($origem, $destino) < $distancia){
                                $count_workers++;
                                $aux = number_format($f->haversine($origem, $destino), 2, ',', '.');
                                $list[$aux] = $row_worker['id'];
                                ksort($list);
                            }
                        }
                    ?>

                    <?php
                        switch($filtro){
                            case "menorD":
                                foreach($list as $worker => $id){
                                    $query = mysqli_query($conn,"SELECT * FROM user WHERE id = ".$id);
                                    if(mysqli_num_rows($query) > 0) {
                                        while($row_worker = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <div class="list-item z-depth-1 hoverable">
                                                <img src="<?php echo $row_worker['profile_picture']; ?>" alt="user profile"
                                                    class="circle z-depth-2">
                                                <h6 class="center-align valign-wrapper"><?php echo $row_worker['full_name']; ?></h6>
                                                <a href="../userProfile/?occupation_subcategory=<?php echo $_GET['occupation_subcategory']; ?>&id_service=<?php echo $_GET['id_service']?>&id_user=<?php echo $row_worker['id']; ?>&worker_list"
                                                    class="btn waves-effect waves-light">Ver perfil</a>
                                            </div>
                                        <?php
                                        }
                                    }
                                }
                            break;
                            case "maiorD":
                                krsort($list);
                                foreach($list as $worker => $id){
                                    $query = mysqli_query($conn,"SELECT * FROM user WHERE id = ".$id);
                                    if(mysqli_num_rows($query) > 0) {
                                        while($row_worker = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <div class="list-item z-depth-1 hoverable">
                                                <img src="<?php echo $row_worker['profile_picture']; ?>" alt="user profile"
                                                    class="circle z-depth-2">
                                                <h6 class="center-align valign-wrapper"><?php echo $row_worker['full_name']; ?></h6>
                                                <a href="../userProfile/?occupation_subcategory=<?php echo $_GET['occupation_subcategory']; ?>&id_service=<?php echo $_GET['id_service']?>&id_user=<?php echo $row_worker['id']; ?>&worker_list"
                                                    class="btn waves-effect waves-light">Ver perfil</a>
                                            </div>
                                        <?php
                                        }
                                    }
                                }
                            break;
                            case "menorA":
                            break;
                            case "maiorA":
                            break;
                        }
                    ?>


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
    <script type="text/javascript">
    var service_register = "<?php echo $service_register; ?>";
    if (service_register) {
        M.toast({
            html: 'Serviço cadastrado!'
        });
    }
    </script>
</body>

</html>