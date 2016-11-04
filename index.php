<?php
include ("ArbolBinario.php");

session_start();

if (!isset($_SESSION["ArbolBinario"])) {
  $_SESSION["ArbolBinario"]= new ArbolBinario(null);
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
    <meta charset="utf-8">
    <title>Arbol Binario</title>
     <!--Importar GoogleIcons -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons"
           rel="stylesheet">
    <!--Importar archivos css -->
    <link rel="stylesheet" href="css/materialize.min.css"
           media="screen, projection" type="text/css">
    <link rel="stylesheet" href="css/main.css" media="screen">
   </head>
   <body>
     <!--Menu-->
     <nav>
       <div class="nav-wrapper cyan accent-4">
         <a href="#!" class="brand-logo center">Arbol Binario</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse">
           <i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <li><a href="#">Robinson De La Cruz</a></li>
           <li><a href="#">Daniel Vergara</a></li>
         </ul>
         <ul class="side-nav" id="mobile-demo">
           <li><a href="#">Robinson De La Cruz</a></li>
           <li><a href="#">Daniel Vergara</a></li>
         </ul>
       </div>
    </nav>

    <div class="container">
      <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only">
        <i class="material-icons">menu</i></a>
    </div>
    <ul id="nav-mobile" class="side-nav fixed">
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li><a class="collapsible-header  waves-effect waves-teal"><b>Primeros Pasos</b></a>
              <div class="collapsible-body">
                <ul>
                  <!--aqui van los metodos que agregan y tal-->
                  <!--crear Arbol-->
                  <div class="row">
                    <div class="">
                      <div class="card-panel">
                        <form class="center-align" action="index.php" method="post">
                          <div class="">
                            Crear Arbol
                            <input placeholder="Nombre de la Raiz" type="number" name="nodoRaiz" class="validate">
                            <button class="btn waves-effect waves-light " type="submit" name="action" action="index.php">Crear Arbol
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="">
                      <div class="card-panel">
                        <form class="center-align" action="index.php" method="post">
                          <div class="">
                            Crear Nodos
                            <input placeholder="Nombre del Papa" type="number" name="nodoPadre" class="validate">
                            <input placeholder="Nombre del Hijo" type="number" name="nodoHijo" class="validate">
                            <input type="radio" name="group1" id="test1" value="derecha">
                            <label for="test1">Derecha</label>
                            <input type="radio" name="group1" id="test2" value="izquierda">
                            <label for="test2">Izquierda</label>
                            <button class="btn waves-effect waves-light " type="submit" name="action">Agregar Nodos
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="">
                      <div class="card-panel">
                        <form class="center-align" action="index.php" method="post">
                          <div class="">
                            Eliminar Nodo
                            <input placeholder="Nombre del Nodo" type="text" name="eliminarNodo" class="validate">
                            <button class="btn waves-effect waves-light " type="submit" name="action">Eliminar Nodo
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header  waves-effect waves-teal"><b>Procesos</b></a>
              <div class="collapsible-body">
                <ul>
                  <!--Aqui van los proceso-->
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Numero Nodos</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Numeros Pares</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Arbol Completo</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Ver Nodos Hojas</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Altura</a>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header  waves-effect waves-teal"><b>Recorridos</b></a>
              <div class="collapsible-body">
                <ul>
                  <!--Aqui van los proceso-->
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Niveles</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Pre-Orden</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>In-Orden</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Pos-Orden</a>
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    <!--Importar archivos js-->
     <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>
     <script type="text/javascript" src="js/main.js"></script>
   </body>
 </html>

 <?php
 if(isset($_POST["nodoRaiz"])){
   $_SESSION["ArbolBinario"]->__construct(new NodoBinario($_POST["nodoRaiz"]+=0));
   print_r($_SESSION['ArbolBinario']);
 }

 //Para crear nodo
 if(isset($_POST["nodoPadre"]) && isset($_POST["nodoHijo"])){
   $nodoHijo=new NodoBinario($_POST["nodoHijo"]+=0);
   $_SESSION['ArbolBinario']->agregarNodo($_POST["nodoPadre"]+0, $_POST["group1"], $nodoHijo);
   print_r($_SESSION['ArbolBinario']);
 }

 //Para eliminar nodo
 if(isset($_POST["eliminarNodo"])){
   $_SESSION["ArbolBinario"]->eliminarNodo($_POST["eliminarNodo"]+0);
   print_r($_SESSION['ArbolBinario']);
 }



 ?>
