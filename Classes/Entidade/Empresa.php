<?php
    class Empresa {
        
        private $id_emp;
        private $nome_emp;
		private $email_emp;
        private $cnpj;
        private $telefone_emp;
		private $senha_emp;
        private $cep_emp;
		private $uf_emp;
		private $cidade_emp;
		private $bairro_emp;
		private $endereco_emp;
        private $status_emp;
        
        function getId_emp() {
            return $this->id_emp;
        }

        function getNome_emp() {
            return $this->nome_emp;
        }
		
        function getEmail_emp() {
            return $this->email_emp;
        }

        function getCnpj() {
            return $this->cnpj;
        }

        function getTelefone_emp() {
            return $this->telefone_emp;
        }

        function getSenha_emp() {
            return $this->senha_emp;
        }
		
		function getCep_emp() {
            return $this->cep_emp;
        }
		
		function getUf_emp() {
            return $this->uf_emp;
        }
		
		function getCidade_emp() {
            return $this->cidade_emp;
        }
		
		function getBairro_emp() {
            return $this->bairro_emp;
        }
		
		function getEndereco_emp() {
            return $this->endereco_emp;
        }

        function getStatus_emp() {
            return $this->status_emp;
        }

        function setId_emp($id_emp) {
            $this->id_emp = $id_emp;
        }

        function setNome_emp($nome_emp) {
            $this->nome_emp = $nome_emp;
        }

        function setEmail_emp($email_emp) {
            $this->email_emp = $email_emp;
        }		
		
        function setCnpj($cnpj) {
            $this->cnpj = $cnpj;
        }

        function setTelefone_emp($telefone_emp) {
            $this->telefone_emp = $telefone_emp;
        }

        function setSenha_emp($senha_emp) {
            $this->senha_emp = $senha_emp;
        }
		
		function setCep_emp($cep_emp) {
            $this->cep_emp = $cep_emp;
        } 
		
		function setUf_emp($uf_emp) {
            $this->uf_emp = $uf_emp;
        } 
		
		function setCidade_emp($cidade_emp) {
            $this->cidade_emp = $cidade_emp;
        } 
		
		function setBairro_emp($bairro_emp) {
            $this->bairro_emp = $bairro_emp;
        } 
		
		function setEndereco_emp($endereco_emp) {
            $this->endereco_emp = $endereco_emp;
        } 

        function setStatus_emp($status_emp) {
            $this->status_emp = $status_emp;
        }      
    }
?>