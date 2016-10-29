<?php
include ("ArbolBinario.php");

  $arbol = new ArbolBinario(5);
  
  $arbol->agregarNodo(5, "derecha", 3);
  
  echo $arbol->getDerecha();
  

?>
