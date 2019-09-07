<?php
    class daoContratante{

        public function cadastrarUsuario(Contratante $contratante){
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM contratante WHERE email LIKE '".$contratante->getEmail()."' ");
            $verifica2 = mysqli_query($conn, "SELECT email FROM prestador WHERE email LIKE '".$contratante->getEmail()."' ");
            $linha = mysqli_num_rows($verifica);
            $linha2 = mysqli_num_rows($verifica2);
            if($linha > 0 || $linha2>0){
                header("Location: ../View/UsuarioJaCadastrado/index.html");
            }else{
                $query = "INSERT INTO contratante(full_name, email, password, birth_date, gender, cpf, uf, city, address, neighborhood, home_number, address_complement, cep)
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
                    header("Location: ../View/TelaErro/index.html");
                }
            }
        }

        public function logarUsuario(Contratante $contratante){
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM contratante WHERE email = '".$contratante->getEmail()."' and password = '".$contratante->getSenha()."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                session_start();
                $_SESSION['email'] = $contratante->getEmail();
                $_SESSION['senha'] = $contratante->getSenha();
                header("Location: ../View/SISTEMA/CLIENTE/");
            }else{
                header("Location: ../View/TelaErro/index.html");    
            }
        }

        public function editarContratante(Contratante $usuario){
            include 'conexao.php';
            $editar = mysqli_query($conn, "UPDATE contratante SET full_name = '".$usuario->getnome()."' , email = '".$usuario->getemail()."' ,
            gender = '".$usuario->getsexo()."', cpf = '".$usuario->getcpf()."', uf = '".$usuario->getEstado()."', address = '".$usuario->getrua()."', neighborhood = '".$usuario->getbairro()."',
             home_number = '".$usuario->getnumero()."', address_complement = '".$usuario->getcomplemento()."', cep = '".$usuario->getCEP()."', birth_date = '".$usuario->getDataNasc()."'
               WHERE email = '".$usuario->getemailantigo()."'");
            
            if($editar > 0){
                unset($_SESSION['email']);
                $_SESSION['email'] = $usuario->getEmail();
                header("Location: ../View/SISTEMA/CLIENTE/");
            }else{
                header("Location: ../View/TelaLogin");
            }
        }
        public function editarSenhaCliente(Contratante $usuario){
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT password FROM contratante WHERE email = '".$usuario->getEmail()."' ");
            $linha = mysqli_fetch_assoc($verifica);
            if($linha['password'] != $usuario->getSenhaAntiga()){
                header("Location: ../View/UsuarioJaCadastrado/index.html");
            }else{
            $editar = mysqli_query($conn, "UPDATE contratante SET password = '".$usuario->getSenha()."' WHERE email = '".$usuario->getemail()."'");
            if($editar > 0){
                unset($_SESSION['senha']);
                $_SESSION['senha'] = $usuario->getSenha();
                header("Location: ../View/SISTEMA/CLIENTE/");
            }else{
                header("Location: ../View/TelaLogin");
            }
        }
            
        }

        public function excluirContratante(Contratante $contratante){
            include 'conexao.php';
            $excluir = mysqli_query($conn,"DELETE FROM contratante WHERE email = '".$contratante->getEmail()."' ");

            if($excluir > 0){
                header("Location: ../View/TelaLogin/index.html");
            }
        }

        public function verificaContaContratante(string $email) : string{
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM contratante WHERE email = '".$email."' ");
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