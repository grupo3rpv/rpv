<?php

class EquipamentoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $modelEquipamento = new Application_Model_DbTable_Equipamento();
        $listaEquipamentos = $modelEquipamento->listaEquipamentosPor('descricao', 'asc');
        $this->view->listaEquipamentos = $listaEquipamentos;
    }

}

