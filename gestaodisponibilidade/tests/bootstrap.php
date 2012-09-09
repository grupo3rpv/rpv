<?php

// Define path to application directory
defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
        || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
            realpath(APPLICATION_PATH . '/../library'),
            get_include_path(),
        )));

require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();

// Create application, bootstrap, and run
$application = new Zend_Application(
                APPLICATION_ENV,
                APPLICATION_PATH . '/configs/application.ini'
);

//$application->bootstrap();

Zend_Session::start();


$options = $application->getOptions();
//var_dump($options['resources']['db']);

if (!key_exists('db', $options['resources'])) {
    die('Você não possui configuração de banco de dados no application.ini');
}
$sapi_type = php_sapi_name();
if (substr($sapi_type, 0, 3) == 'cli') {
    $type = PHP_EOL;
} else {
    $type = '<br/>';
}
define('BREAK_LINE', $type);

$db = Zend_Db::factory($options['resources']['db']['adapter'], array(
            'host' => $options['resources']['db']['params']['host'],
            'username' => $options['resources']['db']['params']['username'],
            'password' => $options['resources']['db']['params']['password'],
            'dbname' => null
        ));

/**
 * Deleta Banco de dados existente
 */
$db->beginTransaction();
$dbname = $options['resources']['db']['params']['dbname'];
echo 'Deletando banco de dados: ' . $dbname . BREAK_LINE;
try {
    if (!empty($dbname)) {
        $db->query('drop database ' . $dbname . ';');
    } else {
        die("Não há um dbname configurado no ini");
    }
    $db->commit();
} catch (Exception $e) {
    $db->rollBack();
    echo $e->getMessage() . BREAK_LINE;
}


/**
 * Cria Banco de dados
 */
$db->beginTransaction();
echo 'Criando banco de dados: ' . $dbname . BREAK_LINE;
$db->query('CREATE DATABASE ' . $dbname . ' CHARACTER SET utf8 COLLATE utf8_general_ci;');
$db->commit();
$db->closeConnection();

/**
 * Cria tabelas apartir do SQL Script em Models
 */
//Inicia o banco de dados
$application->getBootstrap()->bootstrap('db');
//$application->getBootstrap()->bootstrap('salt');
//$application->getBootstrap()->bootstrap('cache');
$db = Zend_Db_Table::getDefaultAdapter();
echo 'Criando tabelas' . BREAK_LINE;
try {
    $db->beginTransaction();
    $sql = file_get_contents(APPLICATION_PATH . '/models/rpv.sql');
    $db->query($sql);
    $db->commit();
} catch (Exception $e) {
    echo "Exceção ", $e->getMessage();
}
require_once APPLICATION_PATH . '/../public/db/fixtures.php';

