<?php
/**
* Conexao em MySQLi
* next time, try to use Prepare
 * example on this site: http://www.mustbebuilt.co.uk/php/using-object-oriented-php-with-the-mysqli-extension/
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
    
    public function select_prepare($query, $type) {
        
        $stmt = $this->db->prepare($query);
        //$nome = "%".$team."%";
        
        if((int)$type)
            $stmt->bind_param("i", $type);
        elseif((string)$type)
            $stmt->bind_param ("s", $type);
        else die('definir tipo de parametro');
        
        $field_count = $stmt->field_count;
        $stmt->execute();
        $stmt->store_result();
        $array = array();
        switch ($field_count) {
            case 1:
                $stmt->bind_result($a);
                while ($stmt->fetch()) {
                    $array[1]= $a;
                }
                break;
            case 2:
                $stmt->bind_result($a, $b);
                $numRows = $stmt->num_rows;
                for($i = 0; $i < $numRows; $i ++) {
                    while ($stmt->fetch()) {
                        $array[$numRows]['1'][] = $a;
                        $array[$numRows]['2'][] = $b;
                    }
                }
                break;
            case 3:
                $stmt->bind_result($a, $b, $c);
                $numRows = $stmt->num_rows;
                
                for($i = 0; $i < $numRows; $i ++) {
                    while ($stmt->fetch()) {
                        
                        $array[$numRows]['1'][] = $a;
                        $array[$numRows]['2'][] = $b;
                        $array[$numRows]['3'][] = $c;
                    }
                }
                break;
            case 4:
                $stmt->bind_result($a, $b, $c, $d);
                $numRows = $stmt->num_rows;
                for($i = 0; $i < $numRows; $i ++) {
                    while ($stmt->fetch()) {
                        $array[$numRows]['1'][] = $a;
                        $array[$numRows]['2'][] = $b;
                        $array[$numRows]['3'][] = $c;
                        $array[$numRows]['4'][] = $d;
                    }
                }
                break;
        }
        //$this->print_stmt($stmt);
        $stmt->free_result();
        $stmt->close();
        return $array;
    }
    
    public function number_rows() {
       echo $this->result->num_rows;
    }
    
    public function insert($query) {
        if(!$this->result = $this->db->query($query)) {
            die('houve um erro na query [' . $this->db->error. ']');
        }
        $this->db->real_query($query);
        
    }
    
    public function update($query, $show = FALSE) {
        if(!$this->result = $this->db->query($query)) {
            die('houve um erro na query [' . $this->db->error. ']');
        }
        if($show == TRUE) {
            return $this->db->affected_rows;
        }
        
    }
    
    private function printr($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
        
   
    
    public function close() {
        $this->db->close();
    }
     
    public function print_stmt($stmt) {
        echo '<pre>';
        print_r($stmt);
        echo '</pre>';	
    }
}

?>
