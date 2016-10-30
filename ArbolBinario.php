<?php
include("NodoBinario.php");
class ArbolBinario{
  private $raiz;

  public function __construct($root){
    $this->raiz = $root;
  }

  public function getRaiz(){
    return $this->raiz;
  }

  public function getNodo($nodo, $info){
    if($nodo!=null){
      if($info == $nodo->getInfo()){
         return $nodo;
      }else{
        if($nodo->getDerecha()!=null){
          if($this->getNodo($nodo->getDerecha(), $info)==null){
              return $this->getNodo($nodo->getIzquierda(), $info);
          }
        }
        if($nodo->getIzquierda()!=null){
          if($this->getNodo($nodo->getIzquierda(), $info)==null){
              return $this->getNodo($nodo->getDerecha(), $info);
          }
        }
      }
    }else{
        return null;
    }
  }

  public function agregarNodo($papa, $ubicacion, $nombreHijo){
    //para saber si el nodo a agregar ya existe en el arbol
    $existe = $this->getNodo($this->raiz, $nombreHijo->getInfo());
    //para obtener el nodo papa con la info agregada
    $nombrePapa = $this->getNodo($this->raiz, $papa);
    if($existe == null){
      if($ubicacion == "derecha"){
        $nombrePapa->setDerecha($nombreHijo);
      }
      if($ubicacion == "izquierda"){
        $nombrePapa->setIzquierda($nombreHijo);
      }
    }else{
      return "No se pudo agregar";
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

  //Metodo para allar el nodo padre de un nodo dado
  public function getPadre($nodo, $info){
    if($nodo!=null){
      if($nodo->getDerecha()!=null){
        if($nodo->getDerecha()->getInfo() == $info){
          return $nodo;
        }else{
          if($this->getPadre($nodo->getDerecha(), $info)==null){
            return $this->getPadre($nodo->getIzquierda(), $info);
          }
        }
      }
      if($nodo->getIzquierda()!=null){
        if($nodo->getIzquierda()->getInfo() == $info){
          return $nodo;
        }else{
          if($this->getPadre($nodo->getIzquierda(), $info)==null){
            return $this->getPadre($nodo->getDerecha(), $info);
          }
        }
      }
    }else {
      return null;
    }
  }

  public function eliminarNodo($nodo){
    $nodoEliminar = $this->getNodo($this->raiz, $nodo);
    if($nodoEliminar!=null){
      if($this->esHoja($nodoEliminar)){
        $padre = $this->getPadre($this->raiz, $nodoEliminar->getInfo());
        if($padre->getDerecha()->getInfo() == $nodoEliminar->getInfo()){
          $padre->setDerecha(null);
          return true;
        }
        if($padre->getIzquierda()->getInfo() == $nodoEliminar->getInfo()){
          $padre->setIzquierda(null);
          return true;
        }
      }
    }else{
      return false;
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
