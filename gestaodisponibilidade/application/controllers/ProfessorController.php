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
            $this->_redirect('/professor/perfil');
        }
    }
    
    public function nivelInteresseEditAction() {
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
            $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
            unset($dados['controller']);
            unset($dados['action']);
            unset($dados['module']);
            $dados['id_professor']='1';
           
             $modelNivelInteresse->editarNivelInteresse($dados);
             
             
           $this->_redirect('/professor/perfil');
        }
    }

    public function perfilAction() {
        $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $rowNivelInteresse = $modelNivelInteresse->getDadosPorId('1');
        
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->listaProfessorPorID('1');
        $this->view->professor = $professor;

        $listadisciplinas = array();
        $disciplinaModel = new Application_Model_DbTable_Disciplina();
        if(count($rowNivelInteresse)>0){
        foreach ($rowNivelInteresse as $item) {
              
         $disciplina = $disciplinaModel->getCodigoPorId($item['id_disciplina']);
         $listadisciplinas['nome'][]=$disciplina->getNome();
         $listadisciplinas['codigo'][] =$disciplina->getCodigo();
         $listadisciplinas['nivel_interesse'][] = $item['nivel_interesse'];
         
        }
        }
        else{
         $listadisciplinas['nome'][]='Ainda não informado';
         $listadisciplinas['codigo'][] ='Ainda não informado';
         $listadisciplinas['nivel_interesse'][] = 'Ainda não informado';
         
        }
       // var_dump($listadisciplinas);die();
  
        $this->view->listaDisciplinas = $listadisciplinas;
       }
       
       public function editarNivelInteresseAction(){
     
        $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $rowNivelInteresse = $modelNivelInteresse->getDadosPorId('1');
        
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->listaProfessorPorID('1');
        $this->view->professor = $professor;

        $listadisciplinas = array();
        $disciplinaModel = new Application_Model_DbTable_Disciplina();
        if(count($rowNivelInteresse)>0){
        foreach ($rowNivelInteresse as $item) {
          /*
           * Aqui recupero lista do professor
           */
             
         $disciplina = $disciplinaModel->getCodigoPorId($item['id_disciplina']);
         $listadisciplinas['nome'][]=$disciplina->getNome();
         $listadisciplinas['codigo'][] =$disciplina->getCodigo();
         $listadisciplinas['ementa'][]=$disciplina->getEmenta();
         $listadisciplinas['nivel_interesse'][] = $item['nivel_interesse'];
         $listadisciplinas['id_nivel_interesse'][] = $item['id_nivel_interesse'];
         
        
        }
        
        }
        
         
        $disciplinasTotal = array();
        $arrayListaAtualizada = array();
        $allDisciplinas = $disciplinaModel->listarTodos();
        
       foreach ($allDisciplinas as $value) {
           
            for ($index1 = 0; $index1 < count($listadisciplinas['codigo']); $index1++) {
          
                if($value['codigo']==$listadisciplinas['codigo'][$index1]){  
                  $arrayListaAtualizada['codigo'][]=$value['codigo'];
                   $arrayListaAtualizada['ementa'][]=$value['ementa'];
                   $arrayListaAtualizada['nome'][]=$value['nome'];
                   $arrayListaAtualizada['nivel_interesse'][]=$listadisciplinas['nivel_interesse'][$index1];
                
                      
                }
                          
             
            }
             
                   
               
        }
       
        $this->view->arrayListaAtualizada = $arrayListaAtualizada;
       }

}
