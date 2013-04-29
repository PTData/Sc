<?php
require_once './conexao.class.php';
require_once './conexaoi.class.php';
class Especifico extends Conexao{
    
    public $server = 'localhost';
    public $user = 'root';
    public $pass = 'eurorscg';
    public $db_name = 'data_db';
    
    function __construct() {
        parent::__construct();
    }
    
}

class Ispecifico extends Conexaoi {
    
    public $server = 'localhost';
    public $user = 'root';
    public $pass = 'eurorscg';
    public $db_name = 'data_db';
    
    function __construct() {
        parent::__construct();
    }
    
}


?>
