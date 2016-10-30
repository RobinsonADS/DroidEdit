<?php
include ("ArbolBinario.php");

  $arbol = new ArbolBinario(new NodoBinario(5));

  //Prueba de agregar los nodos
  $arbol->agregarNodo(5, "izquierda", new NodoBinario(3));
  $arbol->agregarNodo(5, "derecha", new NodoBinario(4));
  $arbol->agregarNodo(3, "izquierda", new NodoBinario(6));
  $arbol->agregarNodo(3, "derecha", new NodoBinario(7));

  //Prueba eliminar nodo
  if($arbol->eliminarNodo(4)){
    echo "true";
  }else{
    echo "false";
  }

  echo "<hr>";
  print_r($arbol);


?>
