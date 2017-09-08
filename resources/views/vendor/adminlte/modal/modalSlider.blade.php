<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            {!! Form::open(['method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Slider</h4>
            </div>
            <div class="modal-body" style="background-color: #F6F6F5">
                <input type="hidden" name="idSlider">
                <input type="hidden" name="fileFoto" id="fileFoto">
                <input type="hidden" name="ruta" value="slider/">
                <div class="form-group">
                    <label class="col-md-2 control-label">Micrositio</label>
                    <div class="col-md-10">
                        <select class="form-control" id="idUnidadAcademica">
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
                    <label class="col-md-2" style="padding-top:7px;">Link</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMlink" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <label id="select_file"class="col-md-2" style="padding-top:7px;">Subir foto: </label>
                  <div class="col-md-10" style="padding-top:7px;">
                    <input type="file" id="VMfoto" name="VMfoto" class="form-control">
                  </div>  
                </div>
                 <div id="my_file"></div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12" style="padding-top:15px;">
                    <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('slider.update')}}">Editar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>