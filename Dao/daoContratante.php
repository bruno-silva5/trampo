<?php
    class daoContratante{

        public function cadastrarUsuario(Contratante $contratante){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());
            $verifica = mysqli_query($conn, "select emailCliente from tbCliente where emailCliente = '".$contratante->getEmail()."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                header("Location: ../../Trampo/View/UsuarioJaCadastrado/index.html");
            }else{
                $query = "insert into tbCliente(nomeCliente, emailCliente, senhaCliente, dataNascCliente, sexoCliente, cpfCliente, ufCliente, cidadeCliente, logradouroCliente, bairroCliente, numCasaCliente, complementoCliente)
                            values('".$contratante->getNome()."', '".$contratante->getEmail()."',
                             '".$contratante->getSenha()."', '".$contratante->getDataNasc()."',
                              '".$contratante->getSexo()."', '".$contratante->getCPF()."',
                               '".$contratante->getEstado()."', '".$contratante->getCidade()."',
                                '".$contratante->getRua()."', '".$contratante->getBairro()."',
                                 '".$contratante->getNumero()."', '".$contratante->getComplemento()."')";

                $insert = mysqli_query($conn, $query);               
                if($insert){
                    header("Location: ../../Trampo/View/TelaLogin/");
                }else{
                    echo("Erro ao cadastrar");
                }
            }
        }

        public function logarUsuario(Contratante $contratante){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());

            $verifica = mysqli_query($conn, "select emailCliente from tbCliente where emailCliente = '".$contratante->getEmail()."' and senhaCliente = '".$contratante->getSenha()."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                session_start();
                $_SESSION['email'] = $contratante->getEmail();
                $_SESSION['senha'] = $contratante->getSenha();
                header("Location: ../../Trampo/View/SISTEMA/PRESTADOR/");
            }else{
                header("Location: ../View/TelaErro/index.php");    
            }
        }

        public function editarUsuario(Usuario $usuario, Usuario $usuarioOld){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdUsuario") or die(mysql_error());

            $editar = mysqli_query($conn, "update tbUsuario set nome = '".$usuario->getnome()."' , email = '".$usuario->getemail()."' , senha = '".$usuario->getSenha()."' where senha ='".$usuarioOld->getSenha()."'");
            
            if($editar > 0){
                echo("Editado com sucesso");
            }else{
                echo("Falha na edição senha incorreta");
            }
        }

        public function excluirUsuario(Usuario $usuario){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdUsuario") or die(mysql_error());

            $excluir = mysqli_query($conn,"delete from tbUsuario where senha = '".$usuario->getSenha()."' and nome = '".$usuario->getNome()."'");

            if($excluir > 0){
                echo("Excluido com sucesso");
            }else{
                echo("Erro ao excluir nome ou senha incorretos");
            }
        }

        public function verificaContaContratante(string $email) : string{
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());
            $verifica = mysqli_query($conn, "select emailCliente from tbCliente where emailCliente = '".$email."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                $retorno = "contratante";
            }else{
                $retorno = "null";
            }
            return $retorno;
        }

    }
?>