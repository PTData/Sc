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
    
    public function players($team, $table = false) {
        if(!(int) $team) die('tem de ser valor numérico');
        $query = "SELECT   number_player, name_player, age_player, position_player, quality_player FROM players WHERE idteam_player  = ?";
        $players = $this->db->select_prepare($query, $team);
        $team_quality = 0;
        if($table) {
            $html = '<table> <tr> <td>Numero</td> <td>Nome</td> <td>idade</td> <td>posição</td> <td>Qualidae</td> </tr> ';
            //var_dump($players);
            foreach ($players as $t) {
                $count = count($t[1]);
                var_dump($t[4][1]);
                for($i = 0; $i < $count; $i++) {
                    
                    $html .= '
                        <tr>
                            <td>'.$t[1][$i].'</td>
                            <td>'.$t[2][$i].'</td>
                            <td>'.$t[3][$i].'</td>
                            <td>'.$t[4][$i].'</td> 
                            <td>'.$t[5][$i].'</td> 
                        </tr>
                    ';
                    
                }
                
            } 
            $html .= '</table>';
            echo $html;
            
        } else {
           foreach ($players as $t) {
                $count = count($t[1]);
                for($i = 0; $i < $count; $i++) {
                    echo '<ul>';
                    echo '<li>'.'nome: '. $t[1][$i]. '</li>';
                    echo '<li>'.'idade: ' . $t[2][$i]. '</li>';
                    echo '<li>'.'posicao: ' . $t[3][$i]. '</li>';
                    echo '<li>'.'qualidade: ' . $t[4][$i]. '</li>';
                    echo '</ul>';
                    echo '<div class="clear"></div>';
                    $team_quality += $t[4][$i];
                }
            } 
        }
         
        
        $this->qualidade = $team_quality;
        return $players;
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
