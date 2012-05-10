<?php

class ProfessorController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $modelProfessor= new Application_Model_DbTable_Professor();
        $listaProfessores = $modelProfessor->listaProfessor();        
        $this->view->listaProfessor = $listaProfessores;
    }

    public function adicionarProfessorction() {
        $form = new Application_Form_Professor();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_Professor();
                $model->cadastraProfessor($dados);

                $this->_redirect('/professor/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarProfessorAction() {
        $form = new Application_Form_Sala;
        $numero = $this->getRequest()->getParam(Application_Model_DbTable_Professor::getPrimaryKeyName());

        $salaModel = new Application_Model_DbTable_Professor();
        $arrayProfessor = $professorModel->find($numero)->current()->toArray();

        $modelProfessorNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $listaNivelInteresse = $modelProfessorNivelInteresse->getNiveisInteresse($numero);

        $niveisInteresse = array();
        $i = 0;
        foreach ($listaNivelInteresse as $item) {
            $niveisInteresse[$i] = $item['id_nivelInteresse'];
            $i++;
        }
        $arrayProfessor['id_disciplina'] = $disciplina;
        
        $form->populate($arrayProfessor);
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $professorModel->editarProfessor($dados);
                $this->_redirect('/professor/index');
            }
        }

        $this->view->form = $form;
    }
    
    public function removerProfessorAction() {
        $idDisciplina = $this->_getParam('id_disciplina');
        $professorModel = new Application_Model_DbTable_Disciplina();
        $professorModel->removerSala($idDisciplina);
        $this->_redirect('/professor/index');
    }

}

