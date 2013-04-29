<?php

/**
 * Conexao em MySQLi
 *
 * @author Pedro
 */
class Conexaoi {
    private $db;
    public $result;
    public $server = '', $user = '', $pass = '', $db_name = '';
    
    public $num_rows;
  
    function __construct() {
        $this->db = new mysqli($this->server, $this->user, $this->pass, $this->db_name);
        if($this->db->connect_errno > 0 ) {
            die('Unable to connect to database[' - $this->db->connect_error . ']');
        }
    }
    
    public function select($query, $row = FALSE) {
        
        if(!$this->result = $this->db->query($query)) {
            die('houve um erro na query [' . $this->db->error. ']');
        }
        if($row == FALSE) {
            $array = array();
            while($row = $this->result->fetch_assoc()) {
                $array[] = $row;
            }
            //mysqli_free_result($this->result);
            $this->result->free();
            return $array;
            
        } elseif ($row == TRUE) {
            $row = $this->result->fetch_assoc();
            $this->result->free();
            
            return $row;
        }
        
        
        return 0;
        
    }
    
    public function number_rows() {
       echo $this->result->num_rows;
    }
    
    public function update($query, $show = FALSE) {
        if(!$this->result = $this->db->query($query)) {
            die('houve um erro na query [' . $this->db->error. ']');
        }
        if($show == TRUE) {
            return $this->db->affected_rows;
        }
        
    }
    
    public function printr($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
        
   
    
    public function close() {
        $this->db->close();
    }
     
}

?>
