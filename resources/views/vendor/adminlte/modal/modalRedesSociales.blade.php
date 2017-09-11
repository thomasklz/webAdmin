<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            {!! Form::open(['method'=>'PUT']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Red Social</h4>
            </div>
            <div class="modal-body" style="background-color: #F6F6F5">
                <input type="hidden" name="idRedesSociales">
                <input type="hidden" name="ruta" value="redes-sociales/">
                <div class="form-group" style="background-color: #F6F6F5">
                    <label class="col-md-2 control-label">Micrositio</label>
                    <div class="col-md-10">
                        <select class="form-control" name="unidad" id="idUnidadAcademica">
                            @foreach($unidadAcademicas as $unidadAcademica )
                            <option ids="{{ $unidadAcademica->nombre }}" value="{{ $unidadAcademica->id }}">{{ $unidadAcademica->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group" style="background-color: #F6F6F5">
                    <label class="col-md-2" style="padding-top:7px;">Título</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMredSocial" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Link</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMlink" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12" style="padding-top:15px;">
                    <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('redes-sociales.update')}}">Editar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>