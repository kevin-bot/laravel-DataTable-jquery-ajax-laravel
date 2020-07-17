<!-- Modal -->
<form method="POST" action="#">
    @method('PATCH')
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <input type="hidden" name="idEliminar" value="" id="idEliminara">

    <div class="modal fade" id="actualizarestudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar Estudiante</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
         
                            <div class="col-sm">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" value="" id="_codigoa" name="_codigo" placeholder="Ingresa el código">
                                       
                                    </div>
    
                                     <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" class="form-control" id="_nombresa" name="_nombres" placeholder="Ingresa los nombres">
                                       
                                    </div>
    
                                     <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control" id="_apellidosa" name="_apellidos" placeholder="Ingresa los apellidos">
                 
                                    </div>          
                                </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="actualizabtn" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
           
          </div>
        </div>
      </div>
    </div>

</form>