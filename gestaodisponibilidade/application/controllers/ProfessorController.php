<?php

class ProfessorController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $modelProfessor = new Application_Model_DbTable_Professor();
        $listaProfessores = $modelProfessor->listaUsuario();
        $modelProfessor = new Application_Model_DbTable_Professor();
        $this->view->listaProfessor = $listaProfessores;
    }

    public function cadastrarProfessorAction() {
        $form = new Application_Form_Professor();
        $this->inserirAreaForm($form);

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_Professor();
                $model->cadastrarProfessor($dados);

                $this->_redirect('/professor/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarProfessorAction() {

        $form = new Application_Form_Professor();

        $numero = $this->getRequest()->getParam(Application_Model_DbTable_Professor::getPrimaryKeyName());
        $professorModel = new Application_Model_DbTable_Professor();

        $dados = $professorModel->find($numero)->current()->toArray();

        $this->inserirAreaForm($form);

        $form->populate($dados);

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $professorModel->editarProfessor($dados);

                $this->_redirect('/professor/index');
            }
        }

        $this->view->form = $form;
    }

    private function inserirAreaForm($form) {
        $element = $form->getElement(Application_Model_DbTable_Area::getPrimaryKeyName());
        $modelArea = new Application_Model_DbTable_Area();
        $element->addMultiOptions($modelArea->getIdsENomesTodasAreas());
        $form->addElement($element);
    }

    public function removerProfessorAction() {
        $idUsuario = $this->_getParam('id_usuario');
        $professorModel = new Application_Model_DbTable_Professor();
        $professorModel->removerProfessor($idUsuario);
        $this->_redirect('/professor/index');
    }

    public function nivelInteresseAction() {
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
            $modelDisciplina = new Application_Model_DbTable_Disciplina();
            $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
            $lista = array();

            unset($dados['controller']);
            unset($dados['action']);
            unset($dados['module']);

            foreach ($dados as $key => $item) {
                $disciplina = $modelDisciplina->listaDisciplinaPorCodigo($key);
                $lista['id_disciplina'] = $disciplina->getId_disciplina();
                $lista['nivel_interesse'] = $item[$key];
                $lista['id_professor'] = 1;
                $modelNivelInteresse->cadastraNivelInteresse($lista);
                unset($lista);
                ///var_dump($lista);die();
            }
            //var_dump($lista);die();
            $this->_redirect('/curso/listar-cursos');
        }
    }

    public function perfilAction() {
        $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $rowNivelInteresse = $modelNivelInteresse->getDadosPorId('1');
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->listaProfessorPorID($rowNivelInteresse->getId_professor());
        $this->view->professor = $professor;
        $this->view->nivelInteresse = $rowNivelInteresse;
    }

}

