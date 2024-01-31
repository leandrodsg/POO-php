<?php

class ContaBanco {
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    public function __construct(){
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta Criada com Sucesso!</p>";
    }
    
    public function abrirConta($tipo){
        $this->setTipo($tipo);
        $this->setStatus(true);
        if ($this->tipo == "cc"){
            $this->setSaldo(50);
        } elseif ($this->tipo == "cp"){
            $this->setSaldo(150);
        }
    }
    public function fecharConta(){
        if ($this->saldo > 0){
            echo "<p>ERRO - Conta com saldo</p>";
        } elseif ($this->saldo < 0){
            echo "<p>ERRO - Saldo negativo</p>";
        } else {
            $this->setStatus(false);
            echo "<p>Conta fechada com sucesso!</p>";
        }
    }
    public function depositar($valor){
        if ($this->getStatus() == true){
            $this->setSaldo($this->getSaldo() + $valor);
            echo "<p>Deposito de {$valor} na conta de {$this->getDono()}</p>";
        } else {
            echo "<p>ERRO - Conta Fechada</p>";
        }
    }
    public function sacar($valor){
        if ($this->getStatus() == true){
            if ($this->saldo >= $valor){
                $this->setSaldo($this->getSaldo() - $valor);
                echo "<p>Saque de {$valor} autorizado para {$this->getDono()}</p>";
            } else {
                echo "<p>ERRO - Saldo Insuficiente</p>";
            }
        } else {
            echo "<p>ERRO - Conta Fechada</p>";
        }
    }
    public function pagarMensal(){
        if ($this->getTipo() == "cc"){
            $valor = 12;
        } elseif ($this->getTipo() == "cp"){
            $valor = 20;
        }
        if ($this->getStatus() == true){
            if ($this->getSaldo() > $valor){
                $this->setSaldo($this->getSaldo() - $valor);
                echo "<p>Mensalidade de {$valor} descontada de {$this->getDono()}</p>";
            } else {
                echo "<p>ERRO - Saldo Insuficiente</p>";
            }
        } else{
            echo "<p>ERRO - Conta Fechada</p>";
        } 
    }
    public function getNumConta() {
        return $this->numConta;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDono() {
        return $this->dono;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setNumConta($numConta){
        $this->numConta = $numConta;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setDono($dono){
        $this->dono = $dono;
    }

    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    public function setStatus($status){
        $this->status = $status;
    }
}
