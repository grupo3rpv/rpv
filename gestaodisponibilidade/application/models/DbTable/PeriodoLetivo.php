<?php

/**
 * Description of PeriodoLetivo
 *
 * @author thiago
 */
class Application_Model_DbTable_PeriodoLetivo extends Zend_Db_Table_Abstract {
    
    protected $_name = 'periodo_letivo';
    protected $_rowClass = 'Application_Model_PeriodoLetivo';
    protected $_primary = 'id_periodo_letivo';
    
    protected $_dependentTables = array('Application_Model_DbTable_Horario');
    
}