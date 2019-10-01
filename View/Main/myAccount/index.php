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
                <a href="#!" class="brand-logo center">Minha conta</a>
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
            <li id="li-progress"><a href="../progress" class="waves-effect"><i
                        class="material-icons">cached</i>Em
                    progresso</a></li>
            <li id="li-hire"><a href="../hire" class="waves-effect"><i
                        class="material-icons">assignment_ind</i>Contratar</a></li>
            <li id="li-work"><a href="../work" class="waves-effect"><i
                        class="material-icons">build</i>Trabalhar</a></li>
            <li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Configurações</a></li>
            <li id="li-myAccount" class="active"><a href="" class="waves-effect">Minha conta</a></li>
            <li id="li-preferences"><a href="#!" class="waves-effect">Preferências</a>
            </li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#modalLeave" class="waves-effect modal-trigger"><i
                        class="material-icons">power_settings_new</i>Sair</a></li>
        </ul>


        <!-- Section myAccount -->
        <section class="section-myAccount">
            <form action="#">
                <div class="row z-depth-1" style="background:#1e88e54b">
                    <!-- <img class="user-background" src="../_img/user-background.jpg" alt="user background"> -->
                    <div class="user-view">
                        <img class="circle z-depth-3" src="../_img/user.svg" alt="user profile picture">
                        <div class="user-info z-depth-2">
                            <h5><?=$row['full_name']?></h5>
                            <h5><?php echo $row['email'] ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row z-depth-1">
                    <div class="col s12">
                        <h5 class="center-align">Informações pessoais</h5>
                    </div>
                    <div class="input-field col s12 m5">
                        <input type="text" id="full_name" value="<?php echo $row['full_name'] ?>">
                        <label for="full_name">Nome Completo</label>
                    </div>
                    <div class="input-field col s12 m5 offset-m2">
                        <input type="email" id="email" class="validate" value="<?php echo $row['email'] ?>">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-field col s12 m3">
                        <input type="text" id="cpf" value="<?php echo $row['cpf'] ?>">
                        <label for="cpf">CPF</label>
                    </div>

                    <div class="input-field col s12 m7 offset-m2">
                        <p>
                            Sexo:
                            <label>
                                <input class="with-gap" type="radio" name="gender" value="M"
                                    <?php echo($row['gender'] == 'M')?'checked':'' ?>>
                                <span>Masculino</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap" type="radio" name="gender" value="F"
                                    <?php echo($row['gender'] == 'F')?'checked':'' ?>>
                                <span>Feminino</span>
                            </label>
                        </p>
                    </div>

                    <div class="col s12 m8 l7">
                        Data de nascimento:
                        <div class="input-field inline">
                            <input type="date" class="center-align">
                        </div>
                    </div>
                    <div class="input-field col s12 m3 offset-m1">
                        <input type="text" id="phone_number" value="<?php echo $row['phone_number'] ?>">
                        <label for="phone_number">Celular</label>
                    </div>
                </div>
                <div class="row z-depth-1">
                    <div class="col s12">
                        <h5 class="center-align">Endereço</h5>
                    </div>
                    <div class="input-field col s12 m2">
                        <input type="text" id="cep" value="<?php echo $row['cep'] ?>">
                        <label for="cep">CEP</label>
                    </div>
                    <div class="input-field col s12 m5 l4 offset-m1 offset-l1">
                        <select id="states" name="states">
                            <option value="<?php echo $row['uf'] ?>" selected><?php echo $row['uf']?> </option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                    <div class="input-field col s12 m3 l4 offset-m1 offset-l1">
                        <input type="text" id="street" value="<?php echo $row['address'] ?>">
                        <label for="street">Rua</label>
                    </div>
                    <div class="input-field col s12 m2 l2">
                        <input type="text" id="number" value="<?php echo $row['home_number'] ?>">
                        <label for="number">Número</label>
                    </div>
                    <div class="input-field col s12 m5 l4 offset-m1 offset-l1">
                        <input type="text" id="neighborhood" value="<?php echo $row['neighborhood'] ?>">
                        <label for="neighborhood">Bairro</label>
                    </div>
                    <div class="input-field col s12 m3 l4 offset-m1 offset-l1">
                        <input type="text" id="adress_complement" value="<?php echo $row['address_complement'] ?>">
                        <label for="adress_complement">Complemento</label>
                    </div>
                </div>
                <div class="row z-depth-1">
                    <div class="col s12">
                        <h5 class="center-align">Informações de trabalho</h5>
                    </div>
                    <div class="input-field col s12">
                        Eu sou:
                        <div class="input-field inline">
                            <input type="text" class="center-align" placeholder="Digite e pressione enter para adiconar"
                                size="30">
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
                    <div class="input-field col s6 m1 l1">
                        <a href="#modalDesactiveAccount" class="waves-effect waves-light btn modal-trigger"><i
                                class="material-icons">delete</i></a>
                    </div>
                    <div class="input-field col s6 m5 l4 offset-m0 offset-l0 center-align">
                        <a href="#modalPassword" class="waves-effect waves-light btn modal-trigger">Alterar senha</a>
                    </div>
                    <div class="input-field col s12 m2 l2 offset-m4 offset-l5 right-align">
                        <button type="submit" class="waves-effect waves-light btn">Salvar</button>
                    </div>
                </div>
            </form>
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

    <!-- Modal password -->
    <div class="modal" id="modalPassword">
        <div class="modal-content">
            <h4 class="center-align hide-on-small-only">Alterar senha</h4>
            <h5 class="center-align hide-on-med-and-up">Alterar senha</h5>
            <br>
            <form action="#" class="row">
                <div class="input-field col s12">
                    <input type="password" id="old-password">
                    <label for="old-password">Senha atual</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" id="new-password">
                    <label for="old-password">Nova senha</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" id="confirm-password">
                    <label for="confirm-password">Confirmar senha</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col s12 m3 l2 offset-m6 offset-l7 center-align">
                    <a href="#!" class="btn-flat modal-close waves-light">Cancelar</a>
                </div>
                <div class="col s12 m3 center-align">
                    <a href="#!" class="btn modal-close waves-effect waves-light">Salvar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- desactive account -->
    <div class="modal" id="modalDesactiveAccount">
        <div class="modal-content">
            <h5 class="center-align hide-on-med-and-up">Deseja desativar sua conta?</h5>
            <h4 class="center-align hide-on-small-only">Deseja desativar sua conta?</h4>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect btn-flat">Sim</a>
            <button class="modal-close waves-effect btn">Não</button>
        </div>
    </div>

    <script src="../_js/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../_js/bin/materialize.min.js"></script>
    <script type="text/javascript" src="../_js/bin/main.js"></script>
</body>

</html>