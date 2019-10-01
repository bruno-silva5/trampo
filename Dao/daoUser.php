<?php

    class daoUser{

        public function cadastrarUser(User $user) {
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM user WHERE email = '".$user->getEmail()."' ");
            $linha = mysqli_num_rows($verifica);
             if($linha > 0) {
                header("Location: ../View/Error/UsuarioJaCadastrado");
            }else {
                $query = "INSERT INTO user(full_name, email, password, birth_date,
                 gender, cpf, uf, city, address, neighborhood,
                  home_number, address_complement, cep, phone_number)
                            values('".$user->getNome()."', '".$user->getEmail()."',
                             '".$user->getSenha()."', '".$user->getDataNasc()."',
                              '".$user->getSexo()."', '".$user->getCPF()."',
                               '".$user->getEstado()."', '".$user->getCidade()."',
                                '".$user->getRua()."', '".$user->getBairro()."',
                                 '".$user->getNumero()."', '".$user->getComplemento()."', 
                                 '".$user->getCep()."','".$user->getCelular()."')";

                $insert = mysqli_query($conn, $query);               
                if($insert){
                    header("Location: ../View/TelaLogin/");
                }else{
                    header("Location: ../../View/Error/DadosInvalidos");                    
                }
            }
        }

        public function logarUser(User $user){
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM user WHERE email = '".$user->getEmail()."' and password = '".$user->getSenha()."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                session_start();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['senha'] = $user->getSenha();
                header("Location: ../View/Main/progress");
            }else{
                header("Location: ../View/Error/DadosInvalidos");     
            }
        }

        public function editarUser(User $user){
            include 'conexao.php';
            $editar = mysqli_query($conn, "UPDATE user SET full_name = '".$user->getNome()."' , email = '".$user->getemail()."' ,
            gender = '".$user->getsexo()."', cpf = '".$user->getcpf()."',
             uf = '".$user->getEstado()."', address = '".$user->getrua()."',
              neighborhood = '".$user->getbairro()."', home_number = '".$user->getnumero()."',
               address_complement = '".$user->getcomplemento()."', service = '".$user->getservico()."',
              available_for_job = '".$user->getdisponivel()."', cep = '".$user->getCEP()."', birth_date = '".$user->getDataNasc()."', phone_number = '".$user->getCelular()."'
               WHERE email = '".$user->getemailantigo()."'");
            
            if($editar > 0){
                unset($_SESSION['email']);
                $_SESSION['email'] = $user->getEmail();
                header("Location: ../View/Main");
            }else{
                header("Location: ../View/TelaLogin");
            }
        }

        public function editarSenhaUser(User $user){
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT password FROM user WHERE email = '".$user->getEmail()."' ");
            $linha = mysqli_fetch_assoc($verifica);
            if($linha['password'] != $user->getSenhaAntiga()){
                header("Location: ../View/userJaCadastrado/index.html");
            }else{
                $editar = mysqli_query($conn, "UPDATE user SET password = '".$user->getSenha()."' WHERE email = '".$user->getemail()."'");
                if($editar > 0){
                    unset($_SESSION['senha']);
                    $_SESSION['senha'] = $user->getSenha();
                    header("Location: ../View/SISTEMA/PRESTADOR/");
                }else{
                    header("Location: ../View/TelaLogin");
                }
            }
            
        }

        public function excluirUser(User $user){
            include 'conexao.php';
            $excluir = mysqli_query($conn,"DELETE FROM user full_name email = '".$user->getEmail()."' ");

            if($excluir > 0){
                header("Location: ../View/TelaLogin/index.html");
            }else{
                echo("Erro ao excluir nome ou senha incorretos");
            }
        }

        public function RecuperaSenha(User $user){
            include 'conexao.php';
            $recuperar = mysqli_query($conn,"UPDATE user SET password = '{$user->getSenha()}' WHERE  email = '{$user->getEmail()}'");
            if($recuperar > 0){
                header("Location: ../View/TelaLogin/index.html");
            }else{
                echo("Erro ao recuperar nome ou senha incorretos");
            }
        }

        public function verificaContaUser(string $email) : string{
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT email FROM user WHERE email = '".$email."' ");
            $linha = mysqli_num_rows($verifica);
            if($linha > 0){
                $retorno = "user";
            }else{
                $retorno = "null";
            }

            return $retorno;
        }

        public function becomeWorker($email, $occupation_name, $work_info ) {
            include 'conexao.php';
            $query = mysqli_query($conn, "SELECT id FROM user WHERE email LIKE '".$email."'");
            $row = mysqli_fetch_assoc($query);
            $user_id = $row['id'];
            foreach ($occupation_name as $occupation) {
                $query = mysqli_query($conn, "INSERT INTO user_occupation(name, id_user) VALUES('".$occupation."', '".$user_id."')");    
            }
            $query = mysqli_query($conn, "UPDATE user SET work_info = '".$work_info."' WHERE id = '".$user_id."'");  
        }
    }

?>