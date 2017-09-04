@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('css-top')

<link rel="stylesheet" href=" {{ asset('css/wizar/form-elements.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href=" {{ asset('css/wizar/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href=" {{ asset('css/wizar/style.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
      <div class="row">
        <div class="col-md-12">
          <form role="form" action="" method="post" class="f1">
            <h3>Registrar noticias</h3>
            <p>Ingresar toda la información necesaria para publicar la noticia</p>
            <div class="f1-steps">
              <div class="f1-progress">
                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
              </div>
              <div class="f1-step active">
                <div class="f1-step-icon" style="padding-left: 15px;"><i class="fa fa-user"></i></div>
                <p>Noticia</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon" style="padding-left: 13px;"><i class="fa fa-key"></i></div>
                <p>account</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon" style="padding-left: 13px;"><i class="fa fa-twitter"></i></div>
                <p>social</p>
              </div>
            </div>
            <fieldset>
              <h4>Datos de la noticia</h4>
              <br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Categoría</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
              </div>
              <!-- text input -->
              <div class="form-group" >
                <label class="col-sm-2 control-label" style="padding-top:7px;">Título</label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <input type="text" class="form-control">
                </div>
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label class="col-sm-2 control-label" style="padding-top:7px;">Resumen</label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" style="padding-top:7px;">Contenido</label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
              <!-- radio -->
              <div class="form-group">
                <div class="row" style="padding-top:7px;">
                  <label class="col-sm-2 control-label" style="padding-top: 7px;">Publicar:</label>
                  <div class="col-sm-10">
                    <div class="col-md-1">
                      <div class="radio">
                        <label>
                          <input type="radio" name="radio1" value="option1" checked="">
                          Si
                        </label>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="radio">
                        <label>
                          <input type="radio" name="radio1" value="option1">
                          No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="f1-buttons">
                  <button type="button" class="btn btn-next">Next</button>
              </div>
            </fieldset>

                            <fieldset>
                                <h4>Set up your account:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">Email</label>
                                    <input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control" id="f1-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Password</label>
                                    <input type="password" name="f1-password" placeholder="Password..." class="f1-password form-control" id="f1-password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                    <input type="password" name="f1-repeat-password" placeholder="Repeat password..." 
                                                        class="f1-repeat-password form-control" id="f1-repeat-password">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Social media profiles:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">Facebook</label>
                                    <input type="text" name="f1-facebook" placeholder="Facebook..." class="f1-facebook form-control" id="f1-facebook">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-twitter">Twitter</label>
                                    <input type="text" name="f1-twitter" placeholder="Twitter..." class="f1-twitter form-control" id="f1-twitter">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-google-plus">Google plus</label>
                                    <input type="text" name="f1-google-plus" placeholder="Google plus..." class="f1-google-plus form-control" id="f1-google-plus">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                      
                      </form>
                    </div>
                </div>
    </div>
@endsection
@section('scripts-button')
<script src=" {{ asset('js/wizar/jquery.backstretch.min.js') }}"></script>
<script src=" {{ asset('js/wizar/retina-1.1.0.min.js') }}"></script>
<script src=" {{ asset('js/wizar/scripts.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

