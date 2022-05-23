<!-- Modal -->
<div class="modal fade" id="modal_contenedorEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
  data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_modalE">EDITAR CONTENEDOR <i class="fas fa-truck-loading"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Cuerpo del Modal  -->
      <div class="modal-body">
        <form enctype="multipart/form-data" class="row g-3" id="form1">
          <!-------- Inicio de la primera fila  ------->
          <div class="col-md-12">
            <div class="form-group">
              <label for="num_contenedorE"> Número de Contenedor</label>
              <input type="number" id="num_contenedorE" name="num_contenedorE" value="" class="form-control" placeholder="# Numero de Contenedor" />
            </div>
          </div>
          <!-------- Inicio de la segunda fila  ------->
          <div class="col-md-12">
            <div class="form-group">
              <label for="select_tamanoE"> Tamaño</label>
              <select id="select_tamanoE" name="select_tamanoE" class="form-select" aria-label="Default select example">

                <option selected="true" value="20HC">20HC</option>
                <option value="40HC">40HC</option>
              </select>
            </div>
          </div>
          <!-------- Inicio de la cuarta fila ------->
          <div class="col-md-12">
            <div class="form-group">
              <label for="fecha_entradaE"> Fecha de Entrada</label>
              <input type="date" id="fecha_entradaE" name="fecha_entradaE" value="" class="form-control" />
            </div>
          </div>
         <!-------- Inicio de la cuarta fila  ------->
            <div class="col-md-12">
            <div class="form-group">
              <label for="num_econimicoE">Número Económico</label>
              <input type="number" id="num_economicoE" name="num_economicoE" value="" class="form-control" placeholder="# Numero de Económico" />
            </div>
          </div>
          <input type="hidden" id="num_contenedor_ant">
          <!-- Termina Cuerpo del Modal  -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar <i
                class="fas fa-times"></i></button>
            <button type="button" id="btnActualizar" class="btn btn-primary" onclick="actualizarContenedor()">Editar <i
                class="far fa-save"></i></button>
          </div>
      </div>
    </div>
  </div>
  </div>