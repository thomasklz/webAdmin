<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
           {!! Form::open(['id'=>'uploadimage', 'method'=>'PUT', 'files'=>true]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Proyecto</h4>
            </div>
            <div class="modal-body" style="background-color: #F6F6F5">
                <input type="hidden" name="idProyecto">
                <input type="hidden" name="VMfoto">
                <input type="hidden" name="ruta" value="proyecto/">
                <div class="form-group">
                    <label class="col-md-2 control-label">Micrositio</label>
                    <div class="col-md-10">
                        <select class="form-control" name="idUnidadAcademica" id="idUnidadAcademica">
                            @foreach($unidadAcademicas as $unidadAcademica )
                            <option ids="{{ $unidadAcademica->nombre }}" value="{{ $unidadAcademica->id }}">{{ $unidadAcademica->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Estado</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <select class="form-control" name="VMestado" id="idEstadoproyecto">
                            @foreach($estados as $estado )
                            <option ids="{{ $estado->nombre }}" value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Categoría</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <select class="form-control" name="VMcategoria" id="idCategoriaproyecto">
                            @foreach($categorias as $categoria )
                            <option ids="{{ $categoria->categoria }}" value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Autor</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMautor" value="{{ old('autor') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Título</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMtitulo" value="{{ old('titulo') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="padding-top:7px;">Contenido</label>
                    <div class="col-sm-10" style="padding-top:7px;">
                        <textarea class="form-control" cols="100" rows="5" id="contenido" name="VMcontenido"></textarea>
                    </div>
                </div>
                <div class="form-group">
                  <label id="select_file"class="col-md-2" style="padding-top:7px;">Subir foto: </label>
                  <div class="col-md-10" style="padding-top:7px;">
                    <input type="file" id="VMfoto" name="foto" class="form-control">
                  </div>  
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12" style="padding-top:7px;">
                    <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('categoria.update')}}">Editar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>