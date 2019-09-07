<?php
    require("../../../Controller/verifica.php");
    include_once '../../../Dao/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/material.min.css">
    <script src="js/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/main.css">
    <title>Trampo</title>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer mdl-layout--fixed-tabs">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Trampo</span>
                <div class="mdl-layout-spacer"></div>
                <div class="material-icons mdl-badge mdl-badge--overlap chat-icon" data-badge="1">chat</div>
            </div>
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                <a href="#fixed-tab-1" class="mdl-layout__tab is-active"><span>Novos</span></a>
                <a href="#fixed-tab-2" class="mdl-layout__tab">Andamento</a>
                <a href="#fixed-tab-3" class="mdl-layout__tab">Feitos</a>
            </div>
        </header>

        <div class="mdl-layout__drawer">
            <div class="profile">
                <img src="http://onehundreddates.com/wp-content/uploads/2014/03/Random-Person-Date-1.jpg" alt="profile photo">
                <h5>
                <?php 
                $consulta = "SELECT full_name FROM prestador WHERE email = '".$_SESSION['email']."'";
                $res = mysqli_query($conn,$consulta);
                 
                $row = mysqli_fetch_assoc($res);
                echo $row['full_name'];
                
                ?></h5>

            </div>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link active-menu-link" href="#" id="services-btn">Serviços</a>
                <a class="mdl-navigation__link" href="#" id="myAccount-btn">Minha conta</a>
                <a class="mdl-navigation__link" href="#" id="config-btn">Configurações</a>
                <a class="mdl-navigation__link" href="#" id="help-btn">Ajuda</a>
                <a class="mdl-navigation__link" href="#" id="logout-btn">Sair</a>
            </nav>
            <div class="footer-terms">
                <a href="#">Termos de uso</a>
                <a href="#">Política de privacidade</a>
            </div>
        </div>

        <main class="mdl-layout__content">
            <div class="section-page section-page-services ">
                <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                    <div class="page-content">
                        <h5>Filtrar por:</h5>
                        <SELECT>
                            <option value="menorDistancia">Maior Distância</option>
                            <option value="menorDistancia">Menor Distância</option>
                        </SELECT>
                        <div class="card">
                            <div class="card-wrapper">
                                <h5>Tomada não funciona</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo sequi ipsa at, libero tenetur obcaecati atque dolores architecto impedit odio!</p>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Guaianazes</span>
                                </span>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Elétrica</span>
                                </span>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Casa</span>
                                </span>
                            </div>
                            <h3>3.3 KM</h3>
                        </div>

                        <div class="card">
                            <div class="card-wrapper">
                                <h5>Lâmpada Piscando</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo sequi ipsa at, libero tenetur obcaecati atque dolores architecto impedit odio!</p>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Itaquera</span>
                                </span>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Casa</span>
                                </span>
                            </div>
                            <h3>1 KM</h3>
                        </div>

                        <div class="card">
                            <div class="card-wrapper">
                                <h5>Tomada não funciona</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo sequi ipsa at, libero tenetur obcaecati atque dolores architecto impedit odio!</p>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Guaianazes</span>
                                </span>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Elétrica</span>
                                </span>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Casa</span>
                                </span>
                            </div>
                            <h3>3.3 KM</h3>
                        </div>

                        <div class="card">
                            <div class="card-wrapper">
                                <h5>Tomada não funciona</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo sequi ipsa at, libero tenetur obcaecati atque dolores architecto impedit odio!</p>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Guaianazes</span>
                                </span>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Elétrica</span>
                                </span>
                                <span class="mdl-chip">
                                    <span class="mdl-chip__text">Casa</span>
                                </span>
                            </div>
                            <h3>3.3 KM</h3>
                        </div>



                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                    <div class="page-content">
                        Seus serviços em andamento
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-3">
                    <div class="page-content">
                        Serviços realizados
                    </div>
                </section>
            </div>
            <section class="section-page section-page-myAccount">
            <div class="form-wrapper">
                <form action="../../../Controller/editarPrestador.php" method="POST" class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col">
                        <h5>Informações pessoais</h5>
                    </div>
                <?php 

                $consulta = "SELECT * FROM prestador WHERE email = '".$_SESSION['email']."'";
                $res = mysqli_query($conn,$consulta);
                 
                $row = mysqli_fetch_assoc($res);
                
                $data = date('d-m-Y');
                $data = $row['birth_date'];
                $data = implode("/", array_reverse(explode("-", $data)));
                
                   echo('
                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="input-name" name = "name" value="'. $row['full_name'].'">
                            <label class="mdl-textfield__label" for="input-name">Nome</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="email" id="input-email" name = "email" value="'.$row['email'].'">
                            <label class="mdl-textfield__label" for="input-email">E-mail</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--5-col mdl-cell--3-col-tablet">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="max-width: 150px">
                            <input class="mdl-textfield__input" type="text" id="input-cpf" name = "cpf" value="'.$row['cpf'].'">
                            <label class="mdl-textfield__label" for="input-cpf">CPF</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-cell--5-col-tablet" style="min-width: 300px;  margin: 2em 0;">
                        <label>Sexo: &ensp; </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-male">
                                    <input type="radio" id="radio-male" class="mdl-radio__button" name="gender" value="M" checked>
                                    <span class="mdl-radio__label">Masculino &ensp;</span>
                                </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-female">
                                    <input type="radio" id="radio-female" class="mdl-radio__button" name="gender" value="F">
                                    <span class="mdl-radio__label">Feminino</span>
                                </label>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col">
                        <label>Data de nascimento:&emsp;</label>
                        <div class="mdl-textfield mdl-js-textfield" style="max-width: 130px">
                                <input class="mdl-textfield__input input-date" type="text" id="input-birthday"  name = "birthday" value="'.$data.'">
                                <label class="mdl-textfield__label label-birthday" for="input-birthday">dd/mm/aaaa</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col">
                        <h5>Endereço</h5>
                    </div>
                    <div class="mdl-cell mdl-cell--3-col">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="max-width: 110px">
                            <input class="mdl-textfield__input" type="text" id="input-cep" name = "cep" value="'.$row['cep'].'">
                            <label class="mdl-textfield__label" for="input-cep">CEP</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <label>Estado &ensp;</label>
                        <SELECT name="estados-brasil">
                            <option value="">'.$row['uf'].'</option>
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
                        </SELECT>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="input-street" name="street" value="'.$row['address'].'">
                            <label class="mdl-textfield__label" for="input-street">Rua</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--3-col">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 90px">
                            <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="input-number"  name="number" value="'.$row['home_number'].'">
                            <label class="mdl-textfield__label" for="input-number">Número</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col ">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="max-width: 230px">
                            <input class="mdl-textfield__input" type="text" id="input-neighborhood" name="neighborhood" value="'.$row['neighborhood'].'">
                            <label class="mdl-textfield__label" for="input-neighborhood">Bairro</label>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-tablet">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                            <input class="mdl-textfield__input" type="text" id="input-addOnAdress" name="complement" value="'.$row['address_complement'].'">
                            <label class="mdl-textfield__label" for="input-addOnAdress">Complemento</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col">
                        <h5>Ocupação</h5>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col">
                        <label>Área em que atuo:&ensp;</label>
                        <SELECT name="profession">
                        <option>Animação</option>
                        <option>Arquitetura e Urbanismo</option>
                        <option>Artes Visuais</option>
                        <option>Comunicação das Artes do Corpo</option>
                        <option>Conservação e Restauro</option>
                        <option>Dança</option>
                        <option>Design</option>
                        <option>Design de Games</option>
                        <option>Design de Interiores</option>
                        <option>Design de Moda</option>
                        <option>Fotografia</option>
                        <option>História da Arte</option>
                        <option>Jogos Digitais</option>
                        <option>Luteria</option>
                        <option>Motorista</option>
                        <option>Música</option>
                        <option>Produção Cênica</option>
                        <option>Produção Fonográfica</option>
                        <option>Teatro</option>
                        </SELECT>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col" style="margin-top: 3em;">
                        <label>Currículo:&ensp;</label>
                        <input type="file" value="" name="curriculum">
                    </div>
                    <div class="mdl-cell mdl-cell--6-col" style="margin-top: 3em;">
                        <label>Disponível p/ vagas:&ensp;</label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-yes">
                                <input type="radio" id="radio-yes" class="mdl-radio__button" name="choose" value="yes" checked>
                                <span class="mdl-radio__label">Sim &ensp;</span>
                            </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-no">
                                <input type="radio" id="radio-no" class="mdl-radio__button" name="choose" value="no">
                                <span class="mdl-radio__label">Não</span>
                            </label>
                    </div>
                   <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                       <button type="button" class="mdl-button mdl-js-button btn-modal-account">
                            <i class="material-icons">delete_forever</i>
                        </button>
                       <button type="button" class="mdl-button mdl-js-button btn-modal-changePassword">
                       Alterar senha
                       </button>
                   </div>
                   <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                   <a href="../../../Controller/editarPrestador.php"><button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Salvar alterações</button></a>
                   </div>

                </form>'); ?>
            </div>
            </section>
            <section class="section-page section-page-configuration ">
                <h3>Configurações</h3>
            </section>
            <section class="section-page section-page-help ">
                <h3>Ajuda</h3>
            </section>
            <section class="section-page section-page-logout ">
                <h3>Logout-Modal</h3>
            </section>
        </main>
    </div>

    <!-- modal -->
    <div class="modal modal-style">
        <!-- Modal content -->
        <div class="modal-content">
            <button class="mdl-button mdl-js-button mdl-button--icon close-modal-style close-modal">
                <i>&times;</i>
            </button>
            <h3>Deseja sair?</h3>
            <div class="buttons-wrapper">
                <a href="../../../Controller/logout.php"><button class="mdl-button mdl-js-button mdl-js-ripple-effect">Sim</button></a>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="toggleModal()">Não</button>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal-style modal-account">
        <!-- Modal content -->
        <div class="modal-content">
            <button class="mdl-button mdl-js-button mdl-button--icon close-modal-style close-modalAccount">
                <i>&times;</i>
            </button>
            <h3 style="font-size:1.7em">Deseja excluir sua conta?</h3>
            <div class="buttons-wrapper">
            <a href="../../../Controller/excluirPrestador.php"><button class="mdl-button mdl-js-button mdl-js-ripple-effect">Sim</button></a>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="toggleModalAccount()">Não</button>
            </div>
        </div>
    </div>

    <div class="modal-style modal-changePassword">
        <!-- Modal content -->
        <div class="modal-content">
            <button class="mdl-button mdl-js-button mdl-button--icon close-modal-style close-changePassword">
                <i>&times;</i>
            </button>
            <h3 style="font-size:1.7em">Alterar senha</h3>
            <form action="../../../Controller/EditarSenhaPrestador.php" method="POST" class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="input-currentlyPassword" minlength="8" name="senha">
                        <label class="mdl-textfield__label" for="input-currentlyPassword">Senha atual</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="input-newPassword" minlength="8" name="senhaNova">
                        <label class="mdl-textfield__label" for="input-newPassword">Nova senha</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="margin-bottom: 2em">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label " id="txt_confirm_password">
                        <input class="mdl-textfield__input" type="password" id="input-confirmPassword" minlength="8">
                        <label class="mdl-textfield__label" for="input-confirmPassword">Confirmar senha</label>
                    </div>
                </div>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect" onclick="toggleModalChangePassword()">Cancelar</button>
                   <a href="../../../Controller/EditarSenhaPrestador.php"> <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Salvar</button></a>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/main.js "></script>
</body>

</html>