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
                $query = "INSERT INTO tbcliente(nomeCliente, emailCliente, senhaCliente, dataNascCliente, sexoCliente, cpfCliente, ufCliente, cidadeCliente, logradouroCliente, bairroCliente, numCasaCliente, complementoCliente)
                 VALUES('".$contratante->getNome()."','".$contratante->getEmail()."',
                             '".$contratante->getSenha()."', '".$contratante->getDataNasc()."',
                              '".$contratante->getSexo()."', '".$contratante->getCPF()."',
                              '".$contratante->getEstado()."','".$contratante->getCidade()."',
                              '".$contratante->getRua()."', '".$contratante->getBairro()."',
                              '".$contratante->getNumero()."', '".$contratante->getComplemento()."')";

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

        public function editarUsuario(Usuario $usuario, Usuario $usuarioOld){
            $conn = mysqli_connect("localhost","root","") or die(mysqli_error($conn));
            $db = mysqli_select_db($conn, "bdUsuario") or die(mysqli_error($conn));

            $editar = mysqli_query($conn, "update tbUsuario set nome = '".$usuario->getnome()."' , email = '".$usuario->getemail()."' , senha = '".$usuario->getSenha()."' where senha ='".$usuarioOld->getSenha()."'");
            
            if($editar > 0){
                echo("Editado com sucesso");
            }else{
                echo("Falha na edição senha incorreta");
            }
        }

        public function excluirUsuario(Usuario $usuario){
            $conn = mysqli_connect("localhost","root","") or die(mysqli_error($conn));
            $db = mysqli_select_db($conn, "bdUsuario") or die(mysqli_error($conn));

            $excluir = mysqli_query($conn,"delete from tbUsuario where senha = '".$usuario->getSenha()."' and nome = '".$usuario->getNome()."'");

            if($excluir > 0){
                echo("Excluido com sucesso");
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