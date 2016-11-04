<?php
include ("ArbolBinario.php");

  $arbol = new ArbolBinario(new NodoBinario(5));

  //Prueba de agregar los nodos
  $arbol->agregarNodo(5, "izquierda", new NodoBinario(3));
  $arbol->agregarNodo(5, "derecha", new NodoBinario(4));
  $arbol->agregarNodo(3, "izquierda", new NodoBinario(6));
  $arbol->agregarNodo(3, "derecha", new NodoBinario(7));
  $arbol->agregarNodo(6, "derecha", new NodoBinario(8));
  $arbol->agregarNodo(4, "derecha", new NodoBinario(9));
  $arbol->agregarNodo(9, "izquierda", new NodoBinario(10));
  $arbol->agregarNodo(10, "izquierda", new NodoBinario(12));
  $arbol->agregarNodo(12, "izquierda", new NodoBinario(13));

  //Prueba eliminar nodo
  echo "<b>Eliminar: </b>";
  if($arbol->eliminarNodo(7)){
    echo "true";
  }else{
    echo "false";
  }

  //Prueba contarNodos
  echo "<hr>"; echo "<b>Contar nodos: </b>";
  echo $arbol->contarNodos($arbol->getRaiz());


  //Prueba metodos contar numeros pares
  echo "<hr>"; echo "<b>Contar nodos pares: </b>";
  echo $arbol->contarNumerosPares($arbol->getRaiz());

  //Prueba Altura
  echo "<hr>"; echo "<b>Altura: </b>";
  echo $arbol->altura($arbol->getRaiz())+1;

  //Recorrido por niveles
  echo "<hr>"; echo "<b>Recorrido por niveles: </b>";
  print_r($arbol->recorridoNiveles());

  //Prueba recorrido pre orden
  echo "<hr>"; echo "<b>Recorrido pre orden: </b>";
  //print_r($arbol->preOrden($arbol->getRaiz()), $imprimir=array());

  echo "<hr>";
  print_r($arbol);


?>
