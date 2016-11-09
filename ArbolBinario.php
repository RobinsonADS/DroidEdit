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

  public function getNodo($raiz,$dato){
  if($raiz !=null){
   if($raiz->getInfo() == $dato){
    return $raiz;
   }else{
    $resultado = $this->getNodo($raiz->getIzquierda(),$dato);
    if ($resultado == null) {
     $resultado = $this->getNodo($raiz->getDerecha(),$dato);
    }
   }
   return $resultado;
  }
 }

  public function agregarNodo($papa, $ubicacion, $nombreHijo){
    //para saber si el nodo a agregar ya existe en el arbol
    $existe = $this->getNodo($this->raiz, $nombreHijo->getInfo());
    //para obtener el nodo papa con la info agregada
    $nombrePapa = $this->getNodo($this->raiz, $papa);
    if($existe == null && $nombrePapa != null){
      if($ubicacion == "derecha"){
        if($nombrePapa->getDerecha()!=null){
          $auxiliar=$nombrePapa->getDerecha();
          $nombrePapa->setDerecha($nombreHijo);
          $nombrePapa->getDerecha()->setDerecha($auxiliar);
          return true;
        }else {
          $nombrePapa->setDerecha($nombreHijo);
          return true;
        }
      }
      if($ubicacion == "izquierda"){
        if($nombrePapa->getIzquierda()!=null){
          $auxiliar=$nombrePapa->getIzquierda();
          $nombrePapa->setIzquierda($nombreHijo);
          $nombrePapa->getIzquierda()->setIzquierda($auxiliar);
          return true;
        }else{
          $nombrePapa->setIzquierda($nombreHijo);
          return true;
        }
      }
    }else{
      return false;
    }
  }

  public function hojas(){
    $nodos=$this->recorridoNiveles($this->getRaiz());
    $resultado=array();
    foreach ($nodos as $key => $value) {
      if($this->esHoja($this->getNodo($this->getRaiz(), $value))){
        $resultado[]=$value;
      }
    }
    return $resultado;
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
    $resultado;
    if($nodo!=null){
      if($nodo->getDerecha()!=null){
        if($nodo->getDerecha()->getInfo()==$info){
          return $nodo;
        }else{
          $resultado = $this->getPadre($nodo->getDerecha(), $info);
          if($resultado!=null){
            return $resultado;
          }else{
            if($nodo->getIzquierda()!=null){
              if($nodo->getIzquierda()->getInfo()==$info){
                return $nodo;
              }else{
                return $this->getPadre($nodo->getIzquierda(), $info);
              }
            }
          }
        }
      }
      if($nodo->getIzquierda()!=null){
        if($nodo->getIzquierda()->getInfo()==$info){
          return $nodo;
        }else{
          $resultado = $this->getPadre($nodo->getIzquierda(), $info);
          if($resultado!=null){
            return $resultado;
          }else{
            if($nodo->getDerecha()!=null){
              if($nodo->getDerecha()->getInfo()==$info){
                return $nodo;
              }else{
                return $this->getPadre($nodo->getDerecha(), $info);
              }
            }
          }
        }
      }
    }
  }

  public function eliminarNodo($nodo){
    $nodoEliminar = $this->getNodo($this->raiz, $nodo);
    if($nodoEliminar!=null){
      if($this->esHoja($nodoEliminar)){
        $padre = $this->getPadre($this->raiz, $nodoEliminar->getInfo());
        if($padre->getDerecha()!=null){
          if($padre->getDerecha()->getInfo() == $nodoEliminar->getInfo()){
            $padre->setDerecha(null);
            return true;
          }
        }
        if($padre->getIzquierda()!=null){
          if($padre->getIzquierda()->getInfo() == $nodoEliminar->getInfo()){
            $padre->setIzquierda(null);
            return true;
          }
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
        return max($this->altura($nodo->getDerecha()), $this->altura($nodo->getIzquierda()))+1;
      }
      if($nodo->getIzquierda()!=null){
        return max($this->altura($nodo->getDerecha()), $this->altura($nodo->getIzquierda()))+1;
      }else{
        return 0;
      }
    }else{
      return -1;
    }
  }

  public function recorridoNiveles(){
    $root=$this->raiz;
    $cola = array();
    if($root!=null){
      $cola[]=$root;
      while (count($cola)!=0) {
        $v = array_shift($cola);
        $i[] = $v->getInfo();
        if($v->getIzquierda()!=null){
          $cola[]=$v->getIzquierda();
        }
        if($v->getDerecha()!=null){
          $cola[]=$v->getDerecha();
        }
      }
    }
    return $i;
  }

  public function preOrden($nodo){
    if($nodo!=null){
      echo " " . $nodo->getInfo();
      $this->preOrden($nodo->getIzquierda());
      $this->preOrden($nodo->getDerecha());
    }
  }

  public function inOrden($nodo){
    if($nodo!=null){
      $this->inOrden($nodo->getIzquierda());
      echo " ".$nodo->getInfo();
      $this->inOrden($nodo->getDerecha());
    }
  }

  public function posOrden($nodo){
    if($nodo!=null){
      $this->posOrden($nodo->getIzquierda());
      $this->posOrden($nodo->getDerecha());
      echo " ".$nodo->getInfo();
    }
  }

  public function aristas($nodo){
    if($nodo!=null){
      if($nodo->getDerecha()!=null&&$nodo->getIzquierda()!=null){
        $hastaD=$nodo->getDerecha()->getInfo(); $hastaI=$nodo->getIzquierda()->getInfo();
        $de=$nodo->getInfo();
        echo "{from: '$de', to: '$hastaD'},";
        echo "{from: '$de', to: '$hastaI'},";
        $this->aristas($nodo->getDerecha());
        $this->aristas($nodo->getIzquierda());
      }else{
        if($nodo->getIzquierda()!=null){
          $hasta2=$nodo->getIzquierda()->getInfo();
          $de=$nodo->getInfo();
          echo "{from: '$de', to: '$hasta2'},";
          $this->aristas($nodo->getIzquierda());
        }
        if($nodo->getDerecha()!=null){
          $hasta2=$nodo->getDerecha()->getInfo();
          $de=$nodo->getInfo();
          echo "{from: '$de', to: '$hasta2'},";
          $this->aristas($nodo->getDerecha());
        }
      }
    }else{
      echo "";
    }
  }

}//Ultima llave



?>
