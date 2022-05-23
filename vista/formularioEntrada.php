<!-- Modal -->
<div class="modal fade" id="modal_contenedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
  data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_modal">REGISTRAR CONTENEDOR <i class="fas fa-truck-loading"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Cuerpo del Modal  -->
      <div class="modal-body">
        <form enctype="multipart/form-data" class="row g-3" id="form1">
          <!-------- Inicio de la primera fila  ------->
          <div class="col-md-12">
            <div class="form-group">
              <label for="num_contenedor"> Número de Contenedor</label>
              <input type="number" id="num_contenedor" name="num_contenedor" value="" class="form-control" placeholder="# Numero de Contenedor" />
            </div>
          </div>
          <!-------- Inicio de la segunda fila  ------->
          <div class="col-md-12">
            <div class="form-group">
              <label for="select_tamano"> Tamaño</label>
              <select id="select_tamano" name="select_tamano" class="form-select" aria-label="Default select example">

                <option selected="true" value="20HC">20HC</option>
                <option value="40HC">40HC</option>
              </select>
            </div>
          </div>
          <!-------- Inicio de la cuarta fila ------->
          <div class="col-md-12">
            <div class="form-group">
              <label for="fecha_entrada"> Fecha de Entrada</label>
              <input type="date" id="fecha_entrada" name="fecha_entrada" value="" class="form-control" />
            </div>
          </div>
         <!-------- Inicio de la cuarta fila  ------->
            <div class="col-md-12">
            <div class="form-group">
              <label for="num_econimico">Número Económico</label>
              <input type="number" id="num_economico" name="num_economico" value="" class="form-control" placeholder="# Numero de Económico" />
            </div>
          </div>
          <!-- Termina Cuerpo del Modal  -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar <i
                class="fas fa-times"></i></button>
            <button type="button" id="guardarBtn" class="btn btn-primary" onclick="registrarContenedor()">Registrar <i
                class="far fa-save"></i></button>
          </div>
      </div>
    </div>
  </div>
  </div>