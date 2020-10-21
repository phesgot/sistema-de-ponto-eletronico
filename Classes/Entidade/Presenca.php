<?php
    class Presenca {
    
        private $id_presenca;
        private $status_presenca;
        private $entrada;
        private $saida;
        private $fk_folha_presenca;
        private $fk_funcionario_presenca;
        
        function getId_presenca() {
            return $this->id_presenca;
        }

        function getStatus_presenca() {
            return $this->status_presenca;
        }

        function getEntrada() {
            return $this->entrada;
        }

        function getSaida() {
            return $this->saida;
        }

        function getFk_folha_presenca() {
            return $this->fk_folha_presenca;
        }

        function getFk_funcionario_presenca() {
            return $this->fk_funcionario_presenca;
        }

        function setId_presenca($id_presenca) {
            $this->id_presenca = $id_presenca;
        }

        function setStatus_presenca($status_presenca) {
            $this->status_presenca = $status_presenca;
        }

        function setEntrada($entrada) {
            $this->entrada = $entrada;
        }

        function setSaida($saida) {
            $this->saida = $saida;
        }

        function setFk_folha_presenca($fk_folha_presenca) {
            $this->fk_folha_presenca = $fk_folha_presenca;
        }

        function setFk_funcionario_presenca($fk_funcionario_presenca) {
            $this->fk_funcionario_presenca = $fk_funcionario_presenca;
        }


    }
?>