<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
           {!! Form::open(['id'=>'uploadimage', 'method'=>'PUT', 'files'=>true]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Departamento</h4>
            </div>
            <div class="modal-body" style="background-color: #F6F6F5">
                <input type="hidden" name="VMidDepartamento">
                <input type="hidden" name="VMfotoH">
                <input type="hidden" name="ruta" value="unidad-academica/">
                <input type="hidden" name="VMlogoH">
                <div class="form-group">
                    <label class="col-md-2 control-label">Micrositio</label>
                    <div class="col-md-10">
                        <input type="text" name="VMdepartamento" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Frase</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMfrase" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Resumen</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="VMresumen" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Contenido</label>
                    <div class="col-md-10" style="padding-top:7px;">
                      <textarea class="form-control" name="VMcontenido" id="VMcontenido"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                         
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Subir foto: </label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="file" name="VMfoto" id="VMfoto" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Subir logo: </label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="file" name="VMlogo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <div class="col-md-12" style="padding-top:7px;">
                <button type="submit" class="btn btn-primary bnt-edit" data-dismiss="modal" data-update="{{url ('unidad-academica.update')}}">Editar</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>