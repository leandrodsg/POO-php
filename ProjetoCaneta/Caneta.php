<?php

class Caneta {
    private $modelo;
    private $cor;
    private $ponta;
    private $carga;
    private $tampada;
    
    public function rabiscar() {
        if ($this->tampada == true){
            echo "<p>ERRO! Caneta Tampada</p>";
        } else {
            echo "<p>Caneta Destampada... Rabiscando</p>";
        }
    }
    public function tampar() {
        $this->tampada = true;
    }
    public function destampar(){
        $this->tampada = false;
    }
}
