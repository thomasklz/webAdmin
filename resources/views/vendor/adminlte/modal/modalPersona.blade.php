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
                <input type="hidden" name="idPersona">
                <input type="hidden" name="VMfoto">
                <input type="hidden" name="ruta" value="persona/">
                <div class="form-group">
                    <label class="col-md-2 control-label">Micrositio</label>
                    <div class="col-md-10">
                        <select class="form-control" name="VMunidad" id="idUnidadAcademica">
                            @foreach($unidadAcademicas as $unidadAcademica )
                            <option ids="{{ $unidadAcademica->nombre }}" value="{{ $unidadAcademica->id }}">{{ $unidadAcademica->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Nombre</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMnombre" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Apellido</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMapellido" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Cédula</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" maxlength="10" name="VMcedula" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Cargo</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMcargo" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Teléfono</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text"  maxlength="10" name="VMtelefono" class="form-control">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Email</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="email" name="VMemail" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Foto: </label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
            <div class="modal-footer">
                <div class="col-sm-12" style="padding-top:7px;">
                    <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('persona.update')}}">Editar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>