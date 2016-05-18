<?php

/**
 * Description of Player
 *
 * @author pedrodata
 */
class Player {
    private $nome, $idade, $valor, $qualidade, $posicao;
   
    
    public function __construct($nome, $idade, $valor, $qualidade, $posicao) {
        $this->set_nome($nome);
        $this->set_idade($idade);
        $this->set_valor($valor);
        $this->set_qualidade($qualidade);
    }
    
    private function set_nome($setnome) {
        
        if($setnome == '') { 
            $this->nome = 'Sem nome';
            } else { 
            $this->nome = $setnome;
        }
    }
    private function set_idade($setidade) {
        if((int)$setidade) {
            if($setidade < 0) 
                $this->idade = 0; 
            else if($setidade > 35)
                $this->idade = 35;
            else
                $this->idade = $setidade; 
        } else {
            $this->idade = 0;
        }
    }
    private function set_valor($setvalor) {
        if(!(int)$setvalor) #se não é inteiro
            $this->valor = 0;
        else {
            $this->valor = $setvalor;
        }
    }
    private function set_posicao($setposicao) {
        
        $this->posicao = $setposicao;
        
    }
    
    private function set_qualidade($setqualidade) {
        if(!(int)$setqualidade)
            $this->qualidade = 0;
        else 
            $this->qualidade = $setqualidade;
    }
    
    public function get_nome() {
        return $this->nome;
    }
    public function get_idade() {
        return $this->idade;
    }
    public function get_valor() {
        return $this->valor;
    }
     
    /*
    public function __set($name, $value) {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }*/
    
    private function tosca() {
        
    }
}

?>
