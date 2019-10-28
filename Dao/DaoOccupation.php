<?php
    class DaoOccupation {
        public function cadastrar($occupation) {
            include 'conexao.php';
            $verifica = mysqli_query($conn, "SELECT name FROM occupation WHERE name = '" . $occupation . "' ");
            $linha = mysqli_num_rows($verifica);
            if ($linha > 0) {
                echo "Serviço já existente";
            } else {
                $query = "INSERT INTO occupation values('".$occupation."')";
                $insert = mysqli_query($conn, $query);
                if($insert){
                    echo "cadastrado com sucesso";
                }else{
                    echo "erro ao cadastrar";
                }
            }

            return $retorno;
        }
    }