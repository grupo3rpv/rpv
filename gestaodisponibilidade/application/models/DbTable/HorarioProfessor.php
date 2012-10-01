<?php

/**
 * Description of HorarioProfessor
 *
 * @author thiago
 */
class Application_Model_DbTable_HorarioProfessor extends Zend_Db_Table_Abstract {
    
    protected $_name = 'horario_professor';
    
    protected $_dependentTables = array('Application_Model_DbTable_Horario', 'Application_Model_DbTable_Usuario');
    
    protected $_referenceMap =  array(
        'Horario'  => array(
            'refTableClass'  => 'Application_Model_DbTable_Horario',
            'columns'        => array('id_horario'),
            'refColumns'     => 'id_horario'
        ),
        'Usuario'   => array(
            'refTableClass'  => 'Application_Model_DbTable_Usuario',
            'columns'        => array('id_professor'),
            'refColumns'     => 'id_usuario'
        )
    );
    
    public function removerProfessoresdoHorario($idHorario) {
        $where = $this->getAdapter()->quoteInto('id_horario = ?', $idHorario);
        return $this->delete($where);
    }
    
}