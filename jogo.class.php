<?php
/**
 * Created by PhpStorm.
 * User: pedro.data
 * Date: 06-09-2013
 * Time: 17:43
 */


class Jogo {

    private $golo;
    private $equipa1;
    private $equipa2;
    private $nomeOne;
    private $nomeTwo;
    private $forcaOne;
    private $forcaTwo;

    function __construct($equipa1, $equipa2) {

        $this->forcaOne = $equipa1[1];
        $this->forcaTwo = $equipa2[1];
        $this->nomeOne = $equipa1[0];
        $this->nomeTwo = $equipa2[0];
    }

    public function jogar() {
        $rand_um = rand(0, $this->home());
        $rand_dois = rand(0, $this->forcaTwo);
        echo "equipa " . $this->nomeOne . ": " . $rand_um . " vs equipa " . $this->nomeTwo . ": " . $rand_dois;

    }

    private function home() {
        $this->forcaOne = $this->forcaOne + 5;
        $factorCasa = $this->forcaOne;
        return $factorCasa;
    }

}
