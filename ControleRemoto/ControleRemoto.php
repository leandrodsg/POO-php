<?php
require_once 'Controlador.php';
class ControleRemoto implements Controlador{
    private $volume;
    private $ligado;
    private $tocando;
    
    public function __construct() {
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }
    public function getVolume() {
        return $this->volume;
    }

    public function getLigado() {
        return $this->ligado;
    }

    public function getTocando() {
        return $this->tocando;
    }

    public function setVolume($volume){
        $this->volume = $volume;
    }

    public function setLigado($ligado){
        $this->ligado = $ligado;
    }

    public function setTocando($tocando){
        $this->tocando = $tocando;
    }
    public function abrirMenu() {
        echo "<p><>========= MENU ===========<></p>";
        echo "\n";
        echo "On? " .($this->getLigado()?"SIM":"NAO");
        echo "\n";
        echo "Volume: " .($this->getVolume());
        echo "\n";
        echo "Playing? " .($this->getTocando()?"SIM":"NAO");
        echo "<p><>========= ==== ===========<></p>";
    }

    public function desligar() {
        $this->setLigado(false);
    }

    public function desligarMudo() {
        if ($this->getLigado() == true && $this->getVolume = 0){
            $this->setVolume(50);
        }
    }

    public function fecharMenu() {
        echo "<p><>==== MENU ENCERRADO =====<></p>";
    }

    public function ligar() {
        $this->setLigado(true);
    }

    public function ligarMudo() {
        if ($this->getLigado() == true && $this->getVolume > 0){
            $this->setVolume(0);
        }
    }

    public function maisVolume() {
        if ($this->getLigado() == true){
            $this->setVolume($this->getVolume() + 5);  
        }
    }

    public function menosVolume() {
        if ($this->getLigado() == true){
            $this->setVolume($this->getVolume() - 5);
        }
    }

    public function pause() {
        if ($this->getLigado() == true && $this->getTocando() == true){
            $this->setTocando(false);
        }
    }

    public function play() {
        if ($this->getLigado() == true && $this->getTocando() == false){
            $this->setTocando(true);
        }
    }
}
