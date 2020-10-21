<?php
    class Folha {
        
        private $id_folha;
        private $data;
        private $fk_empresa_folha;
        
        function getId_folha() {
            return $this->id_folha;
        }

        function getData() {
            return $this->data;
        }

        function getFk_empresa_folha() {
            return $this->fk_empresa_folha;
        }

        function setId_folha($id_folha) {
            $this->id_folha = $id_folha;
        }

        function setData($data) {
            $this->data = $data;
        }

        function setFk_empresa_folha($fk_empresa_folha) {
            $this->fk_empresa_folha = $fk_empresa_folha;
        }


    }
?>