<!-- Modal -->
<div id="myModalFoto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Fotos</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['method'=>'PUT']) !!} 
                <input type="hidden" name="idNoticia">
                <input type="hidden" name="ruta" value="noticia/">
                <div id="Layer1" style="width:570px; height:300px; overflow: scroll;">
                    <div id="loader" class="text-center"></div>
                    <div class="row" id="ChangePhotos" class="text-center" >
                    </div>
                </div>
            <div class="modal-footer">
                <div class="col-sm-12">
                   <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-updateProyecto="{{url ('noticia/fotos')}}">Editar</button> 
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>