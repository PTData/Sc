<?php
include 'Player.Class.php';
include 'Especifico.php';

/**
 * Description of Team
 *
 * @author pedrodata
 */
class Team {
    
    private $player = array();
    private $idade, $valor, $qualidade;
    private $db;
    
    function __construct() {
       $this->db = new Ispecifico();
    }
     
    private function positions() {
        $gk = 'guarda-redes';
        $def = 'defesa';
        $med = 'médio';
        $for = 'avançado';
    }
    
    private function nomes() {
       $nome = array('Rodrigo', 'Joaquim', 'Inácio', 'Feliciano', 'Pedro', 'Rodrigo', 'Augusto', 'José',
           'Cristovão', 'Bernardo', 'Sílvio', 'Tiago', 'Nelson', 'Hugo', 'Miguel', 'André', 'Luis', 'Carlos', 'Alberto');
       $array_nome = array_rand($nome, 1);
       $apelido = array('Data', 'Gomes', 'Matias', 'Gaspar', 'Rocha', 'Esteves', 'Falcão', 'Pereira', 'Sousa', 'Fernando', 'César',
           'Curioso', 'Teixeira', 'Felisberto', 'Soares', 'Marques');
       $array_apelido = array_rand($apelido, 1);
       return $nome[$array_nome] . ' ' . $apelido[$array_apelido];
    }
    
    public function players($team) {
        if(!(int) $team) die('tem de ser valor numérico');
        $query = "Select id_player, name_player, age_player from players where idteam_player = ?";
        //$query = "Select name_player, age_player, quality_player from players where name_player LIKE= ?";
        $equipa = $this->db->select_prepare($query, $team);
        
        $this->db->close();
        return $equipa;
    }
    
    public function insert_players($team) {
       
       $valor = 5;
       $sql = "INSERT INTO players (name_player, age_player, position_player, value_player, quality_player, idteam_player)";
       $sql .= " VALUES";
       for ($i = 0; $i < 11; $i ++) {
           $this->idade = rand(16, 35);
           $this->qualidade = rand(0, 50);
           $sql .= " ('".$this->nomes()."', '".$this->idade."', '".$this->positions()."','".$valor."', '".$this->qualidade."', $team )";

           if($i < 10) $sql .= ",";
       }
       $this->db->insert($sql);
    }
    
    public function select_all_players($page) {
        $start = ($page - 1) * 15;
        $players = $this->db->select("select id_player, name_player, age_player, value_player from players limit $start, 15");
        
        $json = array();
            $count = 0;
            foreach($players as $j) {
               //$json['players']['count']= $count;
               $json['players'][]['info'] = $j; 
               //$count ++;
            }
        
        return json_encode($json, true);
        //echo $json;
    }
}

?>
