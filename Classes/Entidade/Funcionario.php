<?php
    class Funcionario {
        
        private $id_fun;
        private $nome_fun;
		private $email_fun;
        private $cpf_fun;
        private $jornada;
        private $telefone_fun;
        private $status_fun;
        private $fk_empresa_fun;
        
        function getId_fun() {
            return $this->id_fun;
        }

        function getNome_fun() {
            return $this->nome_fun;
        }

		function getEmail_fun() {
            return $this->email_fun;
        }
		
        function getCpf_fun() {
            return $this->cpf_fun;
        }

        function getJornada() {
            return $this->jornada;
        }

        function getTelefone_fun() {
            return $this->telefone_fun;
        }

        function getStatus_fun() {
            return $this->status_fun;
        }

        function getFk_empresa_fun() {
            return $this->fk_empresa_fun;
        }

        function setId_fun($id_fun) {
            $this->id_fun = $id_fun;
        }

        function setNome_fun($nome_fun) {
            $this->nome_fun = $nome_fun;
        }
		
		function setEmail_fun($email_fun) {
            $this->email_fun = $email_fun;
        }

        function setCpf_fun($cpf_fun) {
            $this->cpf_fun = $cpf_fun;
        }

        function setJornada($jornada) {
            $this->jornada = $jornada;
        }

        function setTelefone_fun($telefone_fun) {
            $this->telefone_fun = $telefone_fun;
        }

        function setStatus_fun($status_fun) {
            $this->status_fun = $status_fun;
        }

        function setFk_empresa_fun($fk_empresa_fun) {
            $this->fk_empresa_fun = $fk_empresa_fun;
        }


    }
?>