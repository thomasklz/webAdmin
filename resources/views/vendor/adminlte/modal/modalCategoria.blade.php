<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Categoría</h4>
      </div>
      <div class="modal-body" style="background-color: #F6F6F5" >
        {!! Form::open(['route' => ['categoria.update', $categoria->id], 'method'=>'PUT']) !!}
        <div class="form-group">
          <label>Categoría</label>
          <input type="text" name="VMCategoria" class="form-control">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{route ('categoria.update', $categoria->id)}}">Editar</button> 
        {!! Form::close() !!}
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
     
    </div>

  </div>
</div>




 