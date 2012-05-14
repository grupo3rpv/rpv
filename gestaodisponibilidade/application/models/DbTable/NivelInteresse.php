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
    public function getDadosPorId($id_professor){
    
       $select = $this->select()->where('id_professor = ?', $id_professor);
        return $this->fetchRow($select);
    }
    public function cadastraNivelInteresse(array $dados) {
        $nivelInteresse = $this->createRow();

        $nivelInteresse->setId_professor($dados['id_professor']);
        $nivelInteresse->setNivelInteresse($dados['nivel_interesse']);
        $nivelInteresse->setId_disciplina($dados['id_disciplina']);
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 87a7cb4fcd8aa8a782aadc89ec07be9eb46ea3bd
        return $nivelInteresse->save();
=======
      return $nivelInteresse->save();
>>>>>>> branch 'master' of https://github.com/grupo3rpv/rpv.git
    }

    public function editarNivelInteresse(array $dados) {
        $nivelInteresse = $this->find(array($dados['id_nivel_interesse'], $dados['id_professor']))->current();

        $nivelInteresse->setId_nivelInteresse($dados['id_nivel_interesse']);
        $nivelInteresse->setId_professor($dados['id_professor']);
        $nivelInteresse->setNivelInteresse($dados['nivel_interesse']);

        return $nivelInteresse->save();
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
