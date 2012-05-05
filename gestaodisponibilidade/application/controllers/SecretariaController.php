<?php

class SecretariaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $modelSala = new Application_Model_DbTable_Sala();
        $listaSalas = $modelSala->listaSala();        
        $this->view->listaSalas = $listaSalas;
    }

    public function adicionarSalaAction() {
        $form = new Application_Form_Sala();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_Sala();
                $model->cadastraSala($dados);

                $this->_redirect('/secretaria/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarSalaAction() {
        $form = new Application_Form_Sala;
        $numero = $this->getRequest()->getParam(Application_Model_DbTable_Sala::getPrimaryKeyName());

        $salaModel = new Application_Model_DbTable_Sala();
        $arraySala = $salaModel->find($numero)->current()->toArray();

        $modelEquipamentoSala = new Application_Model_DbTable_EquipamentoSala();
        $listaEquiSala = $modelEquipamentoSala->getEquipamentosSala($numero);

        $equipamentos = array();
        $i = 0;
        foreach ($listaEquiSala as $item) {
            $equipamentos[$i] = $item['id_equipamento_sala'];
            $i++;
        }
        $arraySala['id_equipamento'] = $equipamentos;
        
        $form->populate($arraySala);
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $salaModel->editarSala($dados);
                $this->_redirect('/secretaria/index');
            }
        }

        $this->view->form = $form;
    }
    
    public function removerSalaAction() {
        $idSala = $this->_getParam('id_sala');
        $salaModel = new Application_Model_DbTable_Sala();
        $salaModel->removerSala($idSala);
        $this->_redirect('/secretaria/index');
    }

}

