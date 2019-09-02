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
                  numCasaPrestador, complementoPrestador, servicoPrestador, cepPrestador,
                   disponivelEmpregoPrestador)
                            values('".$prestador->getNome()."', '".$prestador->getEmail()."',
                             '".$prestador->getSenha()."', '".$prestador->getDataNasc()."',
                              '".$prestador->getSexo()."', '".$prestador->getCPF()."',
                               '".$prestador->getEstado()."', '".$prestador->getCidade()."',
                                '".$prestador->getRua()."', '".$prestador->getBairro()."',
                                 '".$prestador->getNumero()."', '".$prestador->getComplemento()."', 
                                 '".$prestador->getServico()."','".$prestador->getCep()."',
                                  '".$prestador->getDisponivel()."')";

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

        public function editarPrestador(Prestador $usuario){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());

            $editar = mysqli_query($conn, "update tbPrestador set nomePrestador = '".$usuario->getnome()."' , emailPrestador = '".$usuario->getemail()."' ,
            sexoPrestador = '".$usuario->getsexo()."', cpfPrestador = '".$usuario->getcpf()."',
             ufPrestador = '".$usuario->getEstado()."', logradouroPrestador = '".$usuario->getrua()."',
              bairroPrestador = '".$usuario->getbairro()."', numCasaPrestador = '".$usuario->getnumero()."',
               complementoPrestador = '".$usuario->getcomplemento()."', servicoPrestador = '".$usuario->getservico()."',
              disponivelEmpregoPrestador = '".$usuario->getdisponivel()."', cepPrestador = '".$usuario->getCEP()."'
               where emailPrestador = '".$usuario->getemailantigo()."'");
            
            if($editar > 0){
                unset($_SESSION['email']);
                $_SESSION['email'] = $usuario->getEmail();
                header("Location: ../View/SISTEMA/PRESTADOR/");
            }else{
                header("Location: ../View/TelaLogin");
            }
        }

        public function excluirPrestador(Prestador $prestador){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());
            $excluir = mysqli_query($conn,"delete from tbprestador where emailPrestador = '".$prestador->getEmail()."' ");

            if($excluir > 0){
                header("Location: ../View/TelaLogin/index.html");
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