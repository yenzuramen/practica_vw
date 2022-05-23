<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Practica</title>
  <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../libs/sweetalert/dist/sweetalert2.css">
  <link rel="stylesheet" href="../libs/fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../libs/dataTable/jquery.dataTables.min.css">
</head>

<body>

  <header>
    <!-- Barra de navegación-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">VALDEZ & WOODWARD </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">

        </div>
    </nav>
  </header>


  <!-- Empieza el contenido de la pagina A-->
  <div class="d-flex">

    <div class="container mt-4 mr-4" style="">
      <div class="d-flex">
        <div class="col-md-11">
          <h3 class="mt-5">FLUJO DE CONTENEDORES <i class="fa-solid fa-truck-ramp-box"></i></h3>
          <button type="button" class="btn btn-primary" onclick="mostrarModalContenedor()"><i
              class="fa-solid fa-plus"></i> Agregar Entrada</button>
        </div>

      </div>

      <hr>
      <div class="row">
        <div class="col-12 col-md-12">
          <!-- Contenido -->

          <div class="da">


            <br>

            <div class="row">
              <div class="col-md-12">

                <div id="tabla_registrosS">
                  <!-- Aqui va la tabla que se llama en crud.js  -->
                </div>
                <div class="card text-center">
                  <div class="card-header">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio" id="radioEntradas" autocomplete="off"
                        checked>
                      <label class="btn btn-outline-primary" for="radioEntradas">Inventario de Entradas <i
                          class="fa-solid fa-arrow-turn-down"></i></label>

                      <input type="radio" class="btn-check" name="btnradio" id="radioSalidas" autocomplete="off">
                      <label class="btn btn-outline-danger" for="radioSalidas">Historial de Salidas <i
                          class="fa-solid fa-arrow-turn-up"></i></label>


                    </div>
                  </div>

                  <label id="label_nota" class=" alert alert-secondary" style="height: 50px;"><i
                      class="fa-solid fa-circle-info"></i> Inventario actual de contenedores.</label>


                  <div class="mt-2 pb-4 pe-4 ps-4">
                    <table id="tabla_datos" class="table">
                      <!-- Aquí se inserta la tabla. -->
                    </table>

                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Fin row -->
    </div>
  
  <!----------- Fin container -------------------->
  <br>

  <footer class="footer">
    <div class="container"> <span class="text-muted">
      </span> </div>
  </footer>
</div>
  <?php require_once("../vista/formularioEditar.php");?>
  <?php require_once("../vista/formularioEntrada.php");?>


  <!-- Librerías Javascript -->
  <script src="../libs/jquery/jquery-3.6.0.min.js"></script>
  <script src="../libs/fontawesome/js/all.min.js"></script>
  <script src="../libs/sweetalert/dist/sweetalert2.all.js"></script>
  <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
  <script src="../libs/dataTable/jquery.dataTables.min.js"></script>

  <script src="../controlador/index.js"></script>

</body>

</html>