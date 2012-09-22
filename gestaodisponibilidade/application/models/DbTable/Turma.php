<?php

/**
 * Description of Turma
 *
 * @author thiago
 */
class Application_Model_DbTable_Turma extends Zend_Db_Table_Abstract {
    
    protected $_name = 'turma';
    protected $_rowClass = 'Application_Model_Turma';
    protected $_primary = 'id_turma';
    
    protected $_dependentTables = array('Application_Model_DbTable_Horario');
    
}