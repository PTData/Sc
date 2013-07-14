<?php
include 'Player.Class.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Team
 *
 * @author pedrodata
 */
class Team {
    private $player = array();
    private $idade, $valor, $qualidade;
    function __construct() {
       
       $this->qualidade = rand();
       for ($i = 0; $i < 11; $i ++) {
           $this->idade = rand(16, 35);
           $this->qualidade = rand(0, 50);
           $this->player[$i][] = new Player($this->nomes(), $this->idade, $valor, $this->qualidade);
       }
       
    }
    
    
    function nomes() {
       $nome = array('Rodrigo', 'Joaquim', 'Inácio', 'Feliciano', 'Pedro', 'Rodrigo', 'Augusto', 'José',
           'Cristovão', 'Bernardo', 'Sílvio', 'Tiago', 'Nelson', 'Hugo', 'Miguel', 'André', 'Luis', 'Carlos', 'Alberto');
       $array_nome = array_rand($nome, 1);
       $apelido = array('Data', 'Gomes', 'Matias', 'Gaspar', 'Rocha', 'Esteves', 'Falcão', 'Pereira', 'Sousa', 'Fernando', 'César',
           'Curioso', 'Teixeira', 'Felisberto', 'Soares', 'Marques');
       $array_apelido = array_rand($apelido, 1);
       return $nome[$array_nome] . ' ' . $apelido[$array_apelido];
    }
    
    function players() {
        echo '<pre>';
        print_r($this->player);
        echo '</pre>';
    }
}

?>
