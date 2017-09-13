<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
         {!! Form::open(['method'=>'PUT']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Noticia</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idNoticia">
                <input type="hidden" name="ruta" value="noticia/">
                <div class="form-group">
                  <label class="col-md-2" style="padding-top:22px;"><b>Fecha</b></label>
                  <div class="col-md-4" style="padding-top:22px;">
                  <input size="16" type="text" name="VMfecha" readonly class="form_datetime form-control">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;"><b>Publicada</b></label>
                    <div class="col-md-4" style="padding-top:7px;">
                        <select class="form-control" name="publicar" id="publicar">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;"><b>Micrositio</b></label>
                    <div class="col-md-4" style="padding-top:7px;">
                        <select class="form-control" name="unidad" id="idUnidadAcademica">
                            @foreach($unidadAcademicas as $unidadAcademica )
                            <option ids="{{ $unidadAcademica->nombre }}" value="{{ $unidadAcademica->id }}">{{ $unidadAcademica->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;"><b>Categoría</b></label>
                    <div class="col-md-4" style="padding-top:7px;">
                        <select class="form-control" name="categoria" id="idCategoria" >
                            @foreach($categorias as $categoria )
                            <option ids="{{ $categoria->categoria }}" value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;"><b>Título</b></label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMtitulo" class="form-control">
                    </div>
                </div>
               <div class="form-group">
                <label class="col-sm-2 control-label" style="padding-top:7px;"><b>Resumen</b></label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <textarea class="form-control" rows="3" name="resumen"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" style="padding-top:7px;"><b>Contenido</b></label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <div class="box">
                    <div class="box-body pad">
                        <textarea class="textarea form-control" name="contenido"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12" style="padding-top:15px;">
                    <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('evento.update')}}">Editar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>