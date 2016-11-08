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

    <!--Alertify js-->
    <link rel="stylesheet" href="css/alertify.core.css" />
    <link rel="stylesheet" href="css/alertify.default.css" />
    <!--link rel="stylesheet" href="themes/default.min.css" /-->
    <script src="js/alertify.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!--visJs-->
    <script type="text/javascript" src="vis/dist/vis.js"></script>
    <link href="vis/dist/vis.css" rel="stylesheet" type="text/css" />

    <!--visjs-->
    <style type="text/css">
        body {
            font: 10pt sans;
        }

        #mynetwork {
          position: absolute;
          top: 70px;
          left: 310px;
          width: 1048px;
          height: 580px;
          border: 1px solid lightgray;
        }
    </style>
    <script type="text/javascript" src="../../../dist/vis.js"></script>
    <link href="../../../dist/vis.css" rel="stylesheet" type="text/css"/>


    <script type="text/javascript">
    var nodes = new vis.DataSet([
   <?php
       $b = $_SESSION["ArbolBinario"]->recorridoNiveles();
       $auxiliar = 1;
       foreach ($b as $key => $value) {
           if($auxiliar == count($b)){
               echo "{id:  '$value', label:  '$value'}";
           }else{
               echo "{id:  '$value', label:  '$value' },";
               $auxiliar++;
           }
       }

   ?>
       ]);
       var edges = new vis.DataSet([
   <?php
      $_SESSION["ArbolBinario"]->aristas($_SESSION["ArbolBinario"]->getRaiz());
   ?>
       ]);
        var network = null;
        var directionInput = document.getElementById("direction");

        function destroy() {
            if (network !== null) {
                network.destroy();
                network = null;
            }
        }

        function draw() {
            destroy();
            nodes;
            edges;
            var connectionCount = [];
            // create a network
            var container = document.getElementById('mynetwork');
            var data = {
                nodes: nodes,
                edges: edges
            };

            var options = {
                edges: {
                    smooth: {
                        type: 'cubicBezier',
                        forceDirection: (directionInput.value == "UD" || directionInput.value == "DU") ? 'vertical' : 'horizontal',
                        roundness: 0.4
                    },
                    arrows:{
                      to:{
                        enabled:true
                      }
                    }
                },
                layout: {
                    hierarchical: {
                        direction: directionInput.value
                    }
                },
                physics:false
            };
            network = new vis.Network(container, data, options);

            // add event listeners
            network.on('select', function (params) {
                document.getElementById('selection').innerHTML = 'Selection: ' + params.nodes;
            });
        }

    </script>
    <script src="../../googleAnalytics.js"></script>
   </head>
   <body onload="draw();">
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
                        <form class="center-align" action="index2.php" method="post">
                          <div class="">
                            Crear Arbol
                            <input placeholder="Nombre de la Raiz" type="number" name="nodoRaiz" class="validate">
                            <button class="btn waves-effect waves-light " type="submit" name="action" action="index2.php">Crear Arbol
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="">
                      <div class="card-panel">
                        <form class="center-align" action="index2.php" method="post">
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
                        <form class="center-align" action="index2.php" method="post">
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
                  <a class="waves-effect waves-light btn" id="alertaNumeroNodos"><i class="material-icons left">cloud</i>Numero Nodos</a>
                  <a class="waves-effect waves-light btn" id="numerosPares"><i class="material-icons left">cloud</i>Numeros Pares</a>
                  <a class="waves-effect waves-light btn" id="arbolCompleto"><i class="material-icons left">cloud</i>Arbol Completo</a>
                  <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Ver Nodos Hojas</a>
                  <a class="waves-effect waves-light btn" id="altura"><i class="material-icons left">cloud</i>Altura</a>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header  waves-effect waves-teal"><b>Recorridos</b></a>
              <div class="collapsible-body">
                <ul>
                  <!--Aqui van los recorridos-->
                  <a class="waves-effect waves-light btn" id="niveles"><i class="material-icons left">cloud</i>Niveles</a>
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

     <!--Vis.js-->
     <p>
    <input type="button" id="btn-UD" value="Up-Down">
    <input type="button" id="btn-DU" value="Down-Up">
    <input type="button" id="btn-LR" value="Left-Right">
    <input type="button" id="btn-RL" value="Right-Left">
    <input type="hidden" id='direction' value="UD">
</p>

<div id="mynetwork"></div>

<script language="JavaScript">
    var directionInput = document.getElementById("direction");
    var btnUD = document.getElementById("btn-UD");
    btnUD.onclick = function () {
        directionInput.value = "UD";
        draw();
    };
    var btnDU = document.getElementById("btn-DU");
    btnDU.onclick = function () {
        directionInput.value = "DU";
        draw();
    };
    var btnLR = document.getElementById("btn-LR");
    btnLR.onclick = function () {
        directionInput.value = "LR";
        draw();
    };
    var btnRL = document.getElementById("btn-RL");
    btnRL.onclick = function () {
        directionInput.value = "RL";
        draw();
    };
    </script>

    <!--Procesos-->

    <!--Contar nodos-->
    <?php $jsContarNodos = $_SESSION["ArbolBinario"]->contarNodos($_SESSION["ArbolBinario"]->getRaiz()); ?>
  <script>
    var jsContarNodos = <?php echo $jsContarNodos ?>;
    $(document).ready(function(){
      $("#alertaNumeroNodos").click(function(){
        alertify.alert("El arbol tiene " + jsContarNodos + " nodos");
      });
    });
  </script>

  <!--Numeros pares-->
  <?php $numerosPares = $_SESSION["ArbolBinario"]->contarNumerosPares($_SESSION["ArbolBinario"]->getRaiz()); ?>
<script>
  var numerosPares = <?php echo $numerosPares ?>;
  $(document).ready(function(){
    $("#numerosPares").click(function(){
      alertify.alert("El arbol tiene " + numerosPares + " numeros pares");
    });
  });
</script>

<!--Altura del arbol-->
<?php
  $recorridoPorNiveles = $_SESSION["ArbolBinario"]->recorridoNiveles();
  $recorrido=implode(",", $recorridoPorNiveles);
?>
<script>
var recorridoPor = <?php echo $recorrido ?>;
$(document).ready(function(){
  $("#niveles").click(function(){
    alertify.alert("Recorrido por niveles: " + recorridoPor);
  });
});
</script>

<!--Recorridos-->
<!--Altura del arbol-->
<?php $altura = $_SESSION["ArbolBinario"]->altura($_SESSION["ArbolBinario"]->getRaiz())+1; ?>
<script>
var altura = <?php echo $altura ?>;
$(document).ready(function(){
  $("#altura").click(function(){
    alertify.alert("La altura del arbol es: " + altura);
  });
});
</script>

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
