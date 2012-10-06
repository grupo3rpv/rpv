<?php

class ProfessorController extends Zend_Controller_Action {

    public function init() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $entity = Zend_Auth::getInstance()->getIdentity();
            if ($entity->tipo_usuario == 'professor' ||
                    $entity->tipo_usuario == 'coordenador' ||
                    $entity->tipo_usuario == 'admin') {
                
            } else {
                $this->_redirect('/login/acesso-negado/');
            }
        } else {
            $this->_redirect('/login/logar/');
        }
    }

    public function indexAction() {
        $modelProfessor = new Application_Model_DbTable_Professor();
        $listaProfessores = $modelProfessor->listaUsuario();
        $this->view->listaProfessor = $listaProfessores;
    }

    public function cadastrarProfessorAction() {
        $form = new Application_Form_Professor();
        //$this->inserirAreaForm($form);

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

        //$this->inserirAreaForm($form);

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

//    private function inserirAreaForm($form) {
//        $element = $form->getElement(Application_Model_DbTable_Area::getPrimaryKeyName());
//        $modelArea = new Application_Model_DbTable_Area();
//        $element->addMultiOptions($modelArea->getIdsENomesTodasAreas());
//        $form->addElement($element);
//    }

    public function removerProfessorAction() {
        $idUsuario = $this->_getParam('id_usuario');
        $professorModel = new Application_Model_DbTable_Professor();
        $professorModel->removerProfessor($idUsuario);
        $this->_redirect('/professor/index');
    }
    
    public function nivelInteresseAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $idProfessor =$usuario->getId_usuario();
        
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
                $lista['id_professor'] = $idProfessor;
                $modelNivelInteresse->cadastraNivelInteresse($lista);
                unset($lista);
                ///var_dump($lista);die();
            }
            //var_dump($lista);die();
            $this->_redirect('/professor/perfil');
        }
    }

    public function nivelInteresseEditAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $idProfessor =$usuario->getId_usuario();
        
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
            $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
            unset($dados['controller']);
            unset($dados['action']);
            unset($dados['module']);
            $dados['id_professor'] = $idProfessor;

            $modelNivelInteresse->editarNivelInteresse($dados);


            $this->_redirect('/professor/perfil');
        }
    }

    public function perfilAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $idProfessor =$usuario->getId_usuario();
        $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $rowNivelInteresse = $modelNivelInteresse->getDadosPorId($idProfessor);
        
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->listaProfessorPorID($idProfessor);
        $this->view->professor = $professor;

        $listadisciplinas = array();
        $disciplinaModel = new Application_Model_DbTable_Disciplina();
        if (count($rowNivelInteresse) > 0) {
            foreach ($rowNivelInteresse as $item) {

                $disciplina = $disciplinaModel->getCodigoPorId($item['id_disciplina']);
                $listadisciplinas['nome'][] = $disciplina->getNome();
                $listadisciplinas['codigo'][] = $disciplina->getCodigo();
                $listadisciplinas['nivel_interesse'][] = $item['nivel_interesse'];
            }
        } else {
            $listadisciplinas['nome'][] = 'Ainda não informado';
            $listadisciplinas['codigo'][] = 'Ainda não informado';
            $listadisciplinas['nivel_interesse'][] = 'Ainda não informado';
        }
        // var_dump($listadisciplinas);die();

        $this->view->listaDisciplinas = $listadisciplinas;
    }

    public function editarNivelInteresseAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $idProfessor =$usuario->getId_usuario();
       
        $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $rowNivelInteresse = $modelNivelInteresse->getDadosPorId($idProfessor);

        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->listaProfessorPorID($idProfessor);
        $this->view->professor = $professor;

        $listadisciplinas = array();
        $disciplinaModel = new Application_Model_DbTable_Disciplina();
        if (count($rowNivelInteresse) > 0) {
            foreach ($rowNivelInteresse as $item) {

                /*
                 * Aqui recupero lista do professor
                 */

                $disciplina = $disciplinaModel->getCodigoPorId($item['id_disciplina']);
                $listadisciplinas['nome'][] = $disciplina->getNome();
                $listadisciplinas['codigo'][] = $disciplina->getCodigo();
                $listadisciplinas['ementa'][] = $disciplina->getEmenta();
                $listadisciplinas['nivel_interesse'][] = $item['nivel_interesse'];
                $listadisciplinas['id_nivel_interesse'][] = $item['id_nivel_interesse'];
            }
        }


        $disciplinasTotal = array();
        $arrayListaAtualizada = array();
        $allDisciplinas = $disciplinaModel->listarTodos();

        foreach ($allDisciplinas as $value) {

            for ($index1 = 0; $index1 < count($listadisciplinas['codigo']); $index1++) {

                if ($value['codigo'] == $listadisciplinas['codigo'][$index1]) {
                    $arrayListaAtualizada['codigo'][] = $value['codigo'];
                    $arrayListaAtualizada['ementa'][] = $value['ementa'];
                    $arrayListaAtualizada['nome'][] = $value['nome'];
                    $arrayListaAtualizada['nivel_interesse'][] = $listadisciplinas['nivel_interesse'][$index1];
                }
            }
        }

        $this->view->arrayListaAtualizada = $arrayListaAtualizada;
    }

    public function disponibilidadeAulaAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $id_usuario =$usuario->getId_usuario();
        //$id_usuario = $this->getRequest()->getParam('id_usuario');
        $modelDisponibilidadeAula = new Application_Model_DbTable_DisponibilidadeAula();
        $this->view->id_usuario = $id_usuario;
        $this->view->listaDisponibilidades = $modelDisponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
    }

    public function recebeDisponibilidadeAulaAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $id_usuario =$usuario->getId_usuario();
        //$id_usuario = $this->getRequest()->getParam('id_usuario');
        $classe = $this->getRequest()->getParam('id');
        list($hora, $dia) = explode('-', $classe);
        $disponibilidadeAula = new Application_Model_DbTable_DisponibilidadeAula();
        $celula = $disponibilidadeAula->verificaCelulaSelecionada($id_usuario, $dia, $hora);
        if ($celula > 0) {
            $disponibilidadeAula->removeDados($id_usuario, $dia, $hora);
        }
        if ($celula == 0) {
            $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        }
    }

    public function adicionarConvidadoAction() {

        $nome = $this->getRequest()->getParam('nome');

        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->buscaProfessorPorNome($nome);

        $listaId = array();
        $listaId[] = $professor['id_usuario'];
        $this->view->lista = $listaId;
    }

    public function getEventosAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
//         $sessionUsuario = new Application_Model_SessaoUser();
//        $usuario = $sessionUsuario->getSession();
//        $id=$usuario->getId_usuario();
        $id = $this->getRequest()->getParam('id');
        $professorDAO = new Application_Model_DbTable_Usuario();
        $professor = $professorDAO->find($id)->current();
        $eventos = $professor->getEventos();
        $arrayEventos = "";
        $isFirstTime = true;
        /* @var $evento Application_Model_Evento */
        foreach ($eventos as $evento) {
            if ($isFirstTime) {
                $arrayEventos .= $evento->getId_evento() . '|';
                $isFirstTime = false;
            } else {
                $arrayEventos .= '<->' . $evento->getId_evento() . '|';
            }
            $arrayEventos .= $evento->getTitulo() . '|';
            $arrayEventos .= $evento->getData_inicial() . '|';
            $arrayEventos .= $evento->getData_final() . '|';
            $arrayEventos .= $evento->getHora1() . '|';
            $arrayEventos .= $evento->getHora2() . '|';
            $arrayEventos .= $evento->isPrivado();
        }
        echo $arrayEventos;
    }

}
