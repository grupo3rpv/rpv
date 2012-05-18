<?php

class AgendaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $id_professor = '1';
        $arrayEventos = array();
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->find($id_professor)->current();
        $modelEvento = new Application_Model_DbTable_Evento();
        $listaEventos = $modelEvento->getNomePorIdProfessor('1');
        
        foreach ($listaEventos as $value) {
           list($anoI, $mesI, $diaI) =explode("-", $value['data_inicial']); 
           list($anoF, $mesF, $diaF) = explode("-", $value['data_final']); 
           list($horaF, $mimF) = explode(":", $value['hora2']); 
           list($horaI, $mimI) = explode(":", $value['hora1']);
           $arrayEventos['anoInicio'][] = $anoI;
           $arrayEventos['anoFim'][] =$anoF;
           $arrayEventos['mesInicio'][]=$mesI;
           $arrayEventos['mesFim'][]=$mesF;
           $arrayEventos['diaInicio'][]=$diaI;
           $arrayEventos['diaFim'][]=$mesF;
           $arrayEventos['horaInicio'][]=$horaI;
           $arrayEventos['horaFim'][]=$horaF;
           $arrayEventos['minutoInicio'][] =$mimI;
           $arrayEventos['minutoFim'][]=$mimF;
           $arrayEventos['titulo'][]= $value['titulo'];
        } 
        
        $this->view->listaEventos = $arrayEventos;
        $this->view->professor = $professor;
    }
    public function addEventoAction() {
       if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
          
               
                $modelEvento = new Application_Model_DbTable_Evento();
                unset($dados['controller']);
                unset($dados['action']);
                unset($dados['module']);
                $dados['id_professor']='1';
               
                $modelEvento->cadastraEvento($dados); 

                
               $this->_redirect('/agenda/index');
               
            }
        
    }
     public function cadastrarEventoAction() {
        
    }
}