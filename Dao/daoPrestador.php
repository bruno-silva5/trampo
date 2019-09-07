<?php

    class daoPrestador{

        public function cadastrarPrestador(Prestador $prestador){
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM contratante WHERE email = '".$prestador->getEmail()."' ");
            $verifica2 = mysqli_query($conn, "SELECT email FROM prestador WHERE email = '".$prestador->getEmail()."' ");
            $linha = mysqli_num_rows($verifica);
            $linha2 = mysqli_num_rows($verifica2);
             if($linha > 0 || $linha2 >0){
                header("Location: ../View/UsuarioJaCadastrado/index.html");
            }else{
                $query = "INSERT INTO prestador(full_name, email, password, birth_date,
                 gender, cpf, uf, city, address, neighborhood,
                  home_number, address_complement, service, cep,
                   available_for_job)
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
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM prestador WHERE email = '".$prestador->getEmail()."' and password = '".$prestador->getSenha()."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                session_start();
                $_SESSION['email'] = $prestador->getEmail();
                $_SESSION['senha'] = $prestador->getSenha();
                header("Location: ../View/SISTEMA/PRESTADOR/");
            }else{
                header("Location: ../View/TelaErro/index.html");     
            }
        }

        public function editarPrestador(Prestador $usuario){
            include 'conexao.php';
            $editar = mysqli_query($conn, "UPDATE prestador SET nomePrestador = '".$usuario->getnome()."' , email = '".$usuario->getemail()."' ,
            gender = '".$usuario->getsexo()."', cpf = '".$usuario->getcpf()."',
             uf = '".$usuario->getEstado()."', adress = '".$usuario->getrua()."',
              neighborhood = '".$usuario->getbairro()."', home_number = '".$usuario->getnumero()."',
               adress_complement = '".$usuario->getcomplemento()."', service = '".$usuario->getservico()."',
              available_for_job = '".$usuario->getdisponivel()."', cep = '".$usuario->getCEP()."', dataNascCliente = '".$usuario->getDataNasc()."'
               WHERE email = '".$usuario->getemailantigo()."'");
            
            if($editar > 0){
                unset($_SESSION['email']);
                $_SESSION['email'] = $usuario->getEmail();
                header("Location: ../View/SISTEMA/PRESTADOR/");
            }else{
                header("Location: ../View/TelaLogin");
            }
        }
        public function editarSenhaPrestador(Prestador $usuario){
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT password FROM prestador WHERE email = '".$usuario->getEmail()."' ");
            $linha = mysqli_fetch_assoc($verifica);
            if($linha['password'] != $usuario->getSenhaAntiga()){
                header("Location: ../View/UsuarioJaCadastrado/index.html");
            }else{
            $editar = mysqli_query($conn, "UPDATE prestador SET password = '".$usuario->getSenha()."' WHERE email = '".$usuario->getemail()."'");
            if($editar > 0){
                unset($_SESSION['senha']);
                $_SESSION['senha'] = $usuario->getSenha();
                header("Location: ../View/SISTEMA/PRESTADOR/");
            }else{
                header("Location: ../View/TelaLogin");
            }
        }
            
        }

        public function excluirPrestador(Prestador $prestador){
            include 'conexao.php';
            $excluir = mysqli_query($conn,"DELETE FROM prestador full_name email = '".$prestador->getEmail()."' ");

            if($excluir > 0){
                header("Location: ../View/TelaLogin/index.html");
            }else{
                echo("Erro ao excluir nome ou senha incorretos");
            }
        }

        public function verificaContaPrestador(string $email) : string{
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM prestador WHERE email = '".$email."' ");
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