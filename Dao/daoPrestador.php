<?php
    class daoPrestador{

        public function cadastrarPrestador(Prestador $prestador){
            $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());
            $verifica = mysqli_query($conn, "select emailCliente from tbCliente where emailCliente = '".$prestador->getEmail()."' ");
            $verifica2 = mysqli_query($conn, "select emailPrestador from tbPrestador where emailPrestador = '".$prestador->getEmail()."' ");
            $linha = mysqli_num_rows($verifica);
            $linha2 = mysqli_num_rows($verifica2);
             if($linha > 0 || $linha2 >0){
                header("Location: ../View/UsuarioJaCadastrado/index.html");
            }else{
                $query = "insert into tbprestador(nomePrestador, emailPrestador, senhaPrestador, dataNascPrestador,
                 sexoPrestador, cpfPrestador, ufPrestador, cidadePrestador, logradouroPrestador, bairroPrestador,
                  numCasaPrestador, complementoPrestador, servicoPrestador, anoAtuacaoPrestador,
                   disponivelEmpregoPrestador)
                            values('".$prestador->getNome()."', '".$prestador->getEmail()."',
                             '".$prestador->getSenha()."', '".$prestador->getDataNasc()."',
                              '".$prestador->getSexo()."', '".$prestador->getCPF()."',
                               '".$prestador->getEstado()."', '".$prestador->getCidade()."',
                                '".$prestador->getRua()."', '".$prestador->getBairro()."',
                                 '".$prestador->getNumero()."', '".$prestador->getComplemento()."', 
                                 '".$prestador->getServico()."',
                                  '".$prestador->getAnoAtuacao()."', '".$prestador->getDisponivel()."')";

                $insert = mysqli_query($conn, $query);               
                if($insert){
                    header("Location: ../View/TelaLogin/");
                }else{
                    header("Location: ../View/TelaErro/index.html");                    
                }
            }
        }

        public function logarPrestador(Prestador $prestador){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());

            $verifica = mysqli_query($conn, "select emailPrestador from tbPrestador where emailPrestador = '".$prestador->getEmail()."' and senhaPrestador = '".$prestador->getSenha()."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                session_start();
                $_SESSION['email'] = $prestador->getEmail();
                $_SESSION['senha'] = $prestador->getSenha();
                header("Location: ../View/SISTEMA/PRESTADOR/");
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

        public function verificaContaPrestador(string $email) : string{
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());
            $verifica = mysqli_query($conn, "select emailPrestador from tbPrestador where emailPrestador = '".$email."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                $retorno = "prestador";
            }else{
                $retorno = "null";
            }

            return $retorno;
        }

    }
?>