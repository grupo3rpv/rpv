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

        $professor = $professorModel->find($numero)->current()->toArray();
        $form->populate($professor);

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $professorModel->editarProfessor($dados);

                $this->_redirect('/professor/index');
            }
        }

        $this->view->form = $form;
    }

    /* $form = new Application_Form_Professor();
      $numero = $this->getRequest()->getParam(Application_Model_DbTable_Professor::getPrimaryKeyName());

      $professorModel = new Application_Model_DbTable_Professor();
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
     */

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
                //var_dump($lista['id_disciplina']);die();
                $lista['nivel_interesse'] = $item[$key];
                $lista['id_professor'] = '1';
                $modelNivelInteresse->cadastraNivelInteresse($lista);
                unset($lista);
                ///var_dump($lista);die();
            }
            
        
            
            //var_dump($lista);die();
            $this->_redirect('/curso/listar-cursos');
        }
    }
    public function perfilAction(){
       $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
       $rowNivelInteresse = $modelNivelInteresse->getDadosPorId('1');
       
       $modelProfessor = new Application_Model_DbTable_Professor();
       $professor = $modelProfessor->listaProfessorPorID($rowNivelInteresse->getId_professor());
      //var_dump($professor);die();
       $this->view->professor=$professor;
    }

}

