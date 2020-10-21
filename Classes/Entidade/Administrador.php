<?php
    class Administrador {
        
        private $id_adm;
        private $nome_adm;
        private $cpf;
        private $usuario;
        private $senha;
        private $status_adm;
        
	function getId_administrador() {
            return $this->id_administrador;
        }

        function getNome_adm() {
            return $this->nome_adm;
        }

        function getCpf() {
            return $this->cpf;
        }

        function getUsuario() {
            return $this->usuario;
        }

        function getSenha() {
            return $this->senha;
        }

        function getStatus_adm() {
            return $this->status_adm;
        }

        function setId_administrador($id_administrador) {
            $this->id_administrador = $id_administrador;
        }

        function setNome_adm($nome_adm) {
            $this->nome_adm = $nome_adm;
        }

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        function setSenha($senha) {
            $this->senha = $senha;
        }

        function setStatus_adm($status_adm) {
            $this->status_adm = $status_adm;
        }

        
    }
?>