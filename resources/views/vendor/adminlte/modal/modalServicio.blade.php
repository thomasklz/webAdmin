<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            {!! Form::open(['id'=>'uploadimage', 'method'=>'PUT', 'files'=>true]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Servicio</h4>
            </div>
            <div class="modal-body" style="background-color: #F6F6F5">
                <input type="hidden" name="idServicio">
                <input type="hidden" name="VMfoto">
                <input type="hidden" name="ruta" value="servicio/">
                <div class="form-group">
                    <label class="col-md-2 control-label">Micrositio</label>
                    <div class="col-md-10">
                        <select class="form-control" name="unidad" id="idUnidadAcademica">
                            @foreach($unidadAcademicas as $unidadAcademica )
                            <option ids="{{ $unidadAcademica->nombre }}" value="{{ $unidadAcademica->id }}">{{ $unidadAcademica->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Título</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMtitulo" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" style="padding-top:7px;"><b>Contenido</b></label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <div class="box">
                    <div class="box-body pad">
                        <textarea class="form-control" name="VMcontenido" id="VMcontenido"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                  </div>
                </div>
              </div>
                <div class="form-group">
                  <label id="select_file"class="col-md-2" style="padding-top:7px;">Icono: </label>
                  <div class="col-md-10" style="padding-top:7px;">
                    <input type="text" name="VMicono" class="form-control">
                  </div>  
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12" style="padding-top:15px;">
                    <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('servicio.update')}}">Editar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>