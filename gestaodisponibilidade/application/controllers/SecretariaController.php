<?php

class SecretariaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $modelSala = new Application_Model_DbTable_Sala();
        $listaSalas = $modelSala->listaSalaPor('status_disponibilidade', true);
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
        $modelEquipameto =  new Application_Model_DbTable_Equipamento();
        
        $listaEquiSala = $modelEquipamentoSala->getEquipamentosSala($numero);
        
        $equipamentos =array();
        foreach ($listaEquiSala as $item){
            $equipamentos = $modelEquipameto->getDescricaoPorId($item['id_equipamento_sala']);
         }
         foreach ($equipamentos as $value){
           $arraySala['id_equipamento'][]= $value['descricao']; 
         }
        
        //var_dump($arraySala);
        
        
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

}

