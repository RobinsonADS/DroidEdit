<?php
include("NodoBinario.php");
class ArbolBinario{
  private $raiz;

  public function __construct($root){
    $this->raiz = $root;
  }

  public function agregarNodo($nombrePapa, $ubicacion, $nombreHijo){
    if($ubicacion == "derecha"){
      $nombrePapa->setDerecha($nombreHijo);
    }
    if($ubicacion == "izquierda"){
      $nombrePapa->setIzquierda($nombreHijo);
    }
  }

  public function esHoja($nodo){
    if($nodo->getDerecha()==null){
      if($nodo->getIzquierda()==null){
        return true;
      }
    }
    if($nodo->getIzquierda()==null){
      if($nodo->getDerecha()==null){
        return true;
      }
    }
    return false;
  }

  public function getPadre($nodo, $info){
    if($nodo->getDerecha() == $info || $nodo->getIzquierda() == $info){
      return $nodo;
    }else{
      if($this->getPadre($nodo->getDerecha())!=null){
        return $this->getPadre($nodo->getDerecha());
      }
      if($this->getPadre($nodo->getIzquierda())!=null){
        return $this->getPadre($nodo->getIzquierda());
      }
    }
    return null;
  }

  public function eliminarNodo($nodoEliminar){
    if($this->esHoja($nodoEliminar)){
      $padre = $this->getPadre($nodoEliminar);
      if($padre->getDerecha() == $nodoEliminar){
        $padre->setDerecha(null);
      }
      if($padre->getIzquierda() == $nodoEliminar){
      $padre->setIzquierda(null);
      }
    }
  }
  
  public function contarNodos($nodo){
    if($nodo != null){
      return $this->contarNodos($nodo->getDerecha())+$this->contarNodos($nodo->getIzquierda())+1;
    }else{
           return 0;
         }
  }
  
  public function contarNumerosPares($nodo){
    if($nodo != null){
      if($nodo->getInfo()%2==0){
        return $this->contarNumerosPares($nodo->getDerecha())+$this->contarNumerosPares($nodo->getIzquierda())+1;
      }else{
              return $this->contarNumerosPares($nodo->getDerecha())+$this->contarNumerosPares($nodo->getIzquierda());
           }
    }else{
            return 0;
         }
  }
  
  public function altura($nodo){
    if($nodo!=null){
      if($nodo->getDerecha()!=null){
        return $this->altura($nodo->getDerecha())+$this->altura($nodo->getIzquierda())+1;
        if($nodo->getIzquierda()!=null){
          return $this->altura($nodo->getDerecha())+$this->altura($nodo->getIzquierda());
        }else{
                return 0;
             }
      }else{
              return 0;
           }
       if($nodo->getIzquierda()!=null){
        return $this->altura($nodo->getDerecha())+$this->altura($nodo->getIzquierda())+1;
        if($nodo->getDerecha()!=null){
          return $this->altura($nodo->getDerecha())+$this->altura($nodo->getIzquierda());
        }else{
                return 0;
             }
      }else{
              return 0;
           }
    }else{
            return 0;  
         }
  
  }

}

?>
