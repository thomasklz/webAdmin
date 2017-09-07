<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content"> 
      {!! Form::open(['method'=>'PUT']) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar el estado</h4>
      </div>
      <div class="modal-body" style="background-color: #F6F6F5" >
       <input type="hidden" name="idEstado">
       <input type="hidden" name="ruta" value="estado-proyecto/">
        <div class="form-group">
          <label>Estado de proyecto</label>
          <input type="text" name="VMEstado" class="form-control">
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-updateProyecto="{{url ('estado-proyecto.update')}}">Editar</button> 
       
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>
