<?php
    class Contratante{
        private $nome;
        private $email;
        private $senha;
        private $cpf;
        private $sexo;
        private $dataNasc;
        private $cep;
        private $estado;
        private $cidade;
        private $rua;
        private $numero;
        private $bairro;
        private $complemento;
        private $emailAntigo;

        public function setEmailAntigo(string $emailAntigo){
            $this->emailAntigo = $emailAntigo;
           }
           public function getEmailAntigo() : string{
               return $this->emailAntigo;
           }
        public function setNome(string $nome){
         $this->nome = $nome;
        }
        public function getNome() : string{
            return $this->nome;
        }

        public function setEmail(string $email){
            $this->email = $email;
        }
        public function getEmail() : string{
            return $this->email;
        }

        public function setSenha($senha){
            $this->senha = $senha;
           }
        public function getSenha() : string{
           return $this->senha;
       }

        public function setCPF(string $cpf){
            $this->cpf = $cpf;
        }
        public function getCPF() : string{
            return $this->cpf;
        }

        public function setSexo(string $sexo){
            $this->sexo = $sexo;
        }
        public function getSexo() : string{
            return $this->sexo;
        }

        public function setDataNasc(string $dataNasc){
            $this->dataNasc = $dataNasc;
        }
        public function getDataNasc() : string{
            return $this->dataNasc;
        }

        public function setCEP(string $cep){
            $this->cep = $cep;
        }
        public function getCEP() : string{
            return $this->cep;
        }

        public function setEstado(string $estado){
            $this->estado = $estado;
        }
        public function getEstado() : string{
            return $this->estado;
        }

        public function setCidade(string $cidade){
            $this->cidade = $cidade;
        }
        public function getCidade() : string{
            return $this->cidade;
        }

        public function setRua(string $rua){
            $this->rua = $rua;
        }
        public function getRua() : string{
            return $this->rua;
        }

        public function setNumero(int $numero){
            $this->numero = $numero;
        }
        public function getNumero() : int{
            return $this->numero;
        }

        public function setBairro(string $bairro){
            $this->bairro = $bairro;
        }
        public function getBairro() : string{
            return $this->bairro;
        }

        public function setComplemento(string $complemento){
            $this->complemento = $complemento;
        }
        public function getComplemento() : string{
            return $this->complemento;
        }

    }
?>