<?php
    class daoContratante{

        public function cadastrarUsuario(Contratante $contratante){
            $conn = mysqli_connect("localhost","root","","bdtrampo") or die(mysqli_error());
            $verifica = mysqli_query($conn, "SELECT emailCliente FROM tbcliente WHERE emailCliente LIKE '".$contratante->getEmail()."' ");
            $verifica2 = mysqli_query($conn, "SELECT emailPrestador FROM tbprestador WHERE emailPrestador LIKE '".$contratante->getEmail()."' ");
            $linha = mysqli_num_rows($verifica);
            $linha2 = mysqli_num_rows($verifica2);
            if($linha > 0 || $linha2>0){
                header("Location: ../View/UsuarioJaCadastrado/index.html");
            }else{
                $query = "INSERT INTO tbcliente(nomeCliente, emailCliente, senhaCliente, dataNascCliente, sexoCliente, cpfCliente, ufCliente, cidadeCliente, logradouroCliente, bairroCliente, numCasaCliente, complementoCliente,cepCliente)
                 VALUES('".$contratante->getNome()."','".$contratante->getEmail()."',
                             '".$contratante->getSenha()."', '".$contratante->getDataNasc()."',
                              '".$contratante->getSexo()."', '".$contratante->getCPF()."',
                              '".$contratante->getEstado()."','".$contratante->getCidade()."',
                              '".$contratante->getRua()."', '".$contratante->getBairro()."',
                              '".$contratante->getNumero()."', '".$contratante->getComplemento()."',
                              '".$contratante->getCep()."')";

                $insert = mysqli_query($conn, $query);               
                if($insert){
                    header("Location: ../View/TelaLogin/");
                }else{
                    header("Location: ../View/TelaErro/index.php");
                }
            }
        }

        public function logarUsuario(Contratante $contratante){
            $conn = mysqli_connect("localhost","root","") or die(mysqli_error($conn));
            $db = mysqli_select_db($conn, "bdtrampo") or die(mysqli_error($conn));

            $verifica = mysqli_query($conn, "select emailCliente from tbcliente where emailCliente = '".$contratante->getEmail()."' and senhaCliente = '".$contratante->getSenha()."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                session_start();
                $_SESSION['email'] = $contratante->getEmail();
                $_SESSION['senha'] = $contratante->getSenha();
                header("Location: ../View/SISTEMA/CLIENTE/");
            }else{
                header("Location: ../View/TelaErro/index.php");    
            }
        }

        public function editarContratante(Contratante $usuario){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());

            $editar = mysqli_query($conn, "update tbCliente set nomeCliente = '".$usuario->getnome()."' , emailCliente = '".$usuario->getemail()."' ,
            sexoCliente = '".$usuario->getsexo()."', cpfCliente = '".$usuario->getcpf()."', ufCliente = '".$usuario->getEstado()."', logradouroCliente = '".$usuario->getrua()."', bairroCliente = '".$usuario->getbairro()."',
             numCasaCliente = '".$usuario->getnumero()."', complementoCliente = '".$usuario->getcomplemento()."', cepCliente = '".$usuario->getCEP()."'
               where emailCliente = '".$usuario->getemailantigo()."'");
            
            if($editar > 0){
                unset($_SESSION['email']);
                $_SESSION['email'] = $usuario->getEmail();
                header("Location: ../View/SISTEMA/CLIENTE/");
            }else{
                header("Location: ../View/TelaLogin");
            }
        }


        public function excluirContratante(Contratante $contratante){
            $conn = mysqli_connect("localhost","root","") or die(mysql_error());
            $db = mysqli_select_db($conn, "bdTrampo") or die(mysql_error());
            $excluir = mysqli_query($conn,"delete from tbcliente where emailcliente = '".$contratante->getEmail()."' ");

            if($excluir > 0){
                header("Location: ../View/TelaLogin/index.html");
            }else{
                echo("Erro ao excluir nome ou senha incorretos");
            }
        }

        public function verificaContaContratante(string $email) : string{
            $conn = mysqli_connect("localhost","root","") or die(mysqli_error($conn));
            $db = mysqli_select_db($conn, "bdtrampo") or die(mysqli_error($conn));
            $verifica = mysqli_query($conn, "select emailCliente from tbcliente where emailCliente = '".$email."' ");
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