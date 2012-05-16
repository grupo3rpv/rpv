<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NivelInteresse
 *
 * @author Helison
 */
class Application_Model_DbTable_NivelInteresse extends Zend_Db_Table_Abstract {

    protected $_name = 'nivel_interesse';
    protected $_rowClass = 'Application_Model_NivelInteresse';
    protected $_referenceMap = array(
        'ProfessorNivelInteresse' => array(
            'refTableClass' => 'Application_Model_DbTable_Professor',
            'columns' => array('id_professor'),
            'refColumns' => 'id_professor'
        )
    );

    public function getDadosPorId($id_professor) {

        $select = $this->select()->where('id_professor = ?', $id_professor);
        return $this->fetchAll($select);
    }

    public function cadastraNivelInteresse(array $dados) {
         $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $rowNivelInteresse = $modelNivelInteresse->getDadosPorId($dados['id_professor']);
       
        //verifica se ja possui niveis de interesse cadastrados
        if (count($rowNivelInteresse) > 0) {
            for ($index = 0; $index < 1; $index++) {
            
               foreach ($rowNivelInteresse as $item) {
                if ( $item['id_disciplina']==$dados['id_disciplina']){
                    unset($dados);
                }
                
               }
            if(count($dados)>0){   
            $nivelInteresse = $this->createRow();

            $nivelInteresse->setId_professor($dados['id_professor']);
            $nivelInteresse->setNivelInteresse($dados['nivel_interesse']);
            $nivelInteresse->setId_disciplina($dados['id_disciplina']);
            $nivelInteresse->save();
            $return = true;
            }
          }
        }
        else{
        $nivelInteresse = $this->createRow();

        $nivelInteresse->setId_professor($dados['id_professor']);
        $nivelInteresse->setNivelInteresse($dados['nivel_interesse']);
        $nivelInteresse->setId_disciplina($dados['id_disciplina']);
        $nivelInteresse->save();
        $return = true;

        return $return;
        }
       
    }

    public function editarNivelInteresse(array $dados) {
        $this->delete('id_professor = ' . $dados['id_professor']);
        $id_prof = $dados['id_professor'];
        unset($dados['id_professor']);
        $modelDisciplina = new Application_Model_DbTable_Disciplina();

        foreach ($dados as $key => $item) {
            $disciplina = $modelDisciplina->listaDisciplinaPorCodigo($key);
            $n = $disciplina->getId_disciplina();

            $nivelInteresse = $this->createRow();

            $nivelInteresse->setId_disciplina($n);
            $nivelInteresse->setId_professor($id_prof);
            $nivelInteresse->setNivelInteresse($item[$key]);
            $nivelInteresse->save();
        }
    }

    public function getNiveisInteresse($id_professor) {
        $select = $this->select()->where('id_professor= ?', $id_professor);
        return $this->fetchAll($select);
    }

    public function removerNivelInteresse($id_professor, $id_nivelinteresse) {
        $nivelInteresse = $this->find(array($id_professor, $id_nivelinteresse))->current();
        return $nivelInteresse->delete();
    }

    public function removerNiveisInteresse($id_professor) {
        $niveisInteresse = $this->getNivelInteresse($id_professor);
        for ($i = 0; $i < count($niveisInteresse); $i++) {
            $niveisInteresse->getRow($i)->delete();
        }
    }

}

?>
