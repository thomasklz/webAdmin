<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content"> 
    {!! Form::open(['method'=>'PUT']) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Categoría</h4>
      </div>
      <div class="modal-body" style="background-color: #F6F6F5" >
       <input type="hidden" name="idCategoria">
        <div class="form-group">
          <label>Categoría</label>
          <input type="text" name="VMCategoria" class="form-control">
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('categoria.update')}}">Editar</button> 
       
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>




 