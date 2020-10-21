<?php
    class Folga {
        
        private $id_folga;
        private $data_inicial;
        private $data_final;
        private $quant_dias;
        private $observacao;
        private $fk_funcionario_folga;
        private $status_folga;
        
        function getId_folga() {
            return $this->id_folga;
        }

        function getData_inicial() {
            return $this->data_inicial;
        }

        function getData_final() {
            return $this->data_final;
        }

        function getQuant_dias() {
            return $this->quant_dias;
        }

        function getObservacao() {
            return $this->observacao;
        }

        function getFk_funcionario_folga() {
            return $this->fk_funcionario_folga;
        }

        function getStatus_folga(){
            return $this->status_folga;
        }

        function setId_folga($id_folga) {
            $this->id_folga = $id_folga;
        }

        function setData_inicial($data_inicial) {
            $this->data_inicial = $data_inicial;
        }

        function setData_final($data_final) {
            $this->data_final = $data_final;
        }

        function setQuant_dias($quant_dias) {
            $this->quant_dias = $quant_dias;
        }

        function setObservacao($observacao) {
            $this->observacao = $observacao;
        }

        function setFk_funcionario_folga($fk_funcionario_folga) {
            $this->fk_funcionario_folga = $fk_funcionario_folga;
        }

        function setStatus_folga($status_folga) {
            $this->status_folga = $status_folga;
        }


    }
?>