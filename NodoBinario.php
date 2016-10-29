<?php
class NodoBinario{
  private $info;
  private $izquierda;
  private $derecha;

  public function __construct($info){
    $this->izquierda = null;
    $this->derecha = null;
    $this->info = $info;
  }

  public function getInfo(){
    return $this->info;
  }

  public function getIzquierda(){
    return $this->izquierda;
  }

  public function getDerecha(){
    return $this->derecha;
  }

  public function setInfo($info){
    $this->info = $info;
  }

  public function setIzquierda($izq){
    $this->izquierda = $izq;
  }

  public function setDerecha($der){
    $this->derecha = $der;    
  }


}




?>
