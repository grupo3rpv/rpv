<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author Helison
 */
class Application_Model_DbTable_Professor extends Zend_Db_Table_Abstract {
    protected $_name = 'professor';
    protected $_rowClass = 'Application_Model_professor';

        public function buscarProfessorPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchRow($select);
    }

    public function listaProfessorPor($alias, $value) {
        $select = $this->select()->where($alias . ' = ?', $value);
        return $this->fetchAll($select);
    }

}

?>
