@extends('adminlte::page')

@section('title', 'Preparacion Formal')

@section('content_header')
    <h1>Preparacion Formal</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.preparacionformal.inidiomasdex')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.preparacion_formal.store') }}">
        @csrf
        <div class="row">            
              <div class="form-group col-lg-3 col-md-3 mb-3">
                <label for="id_grado_academico">Grado Académico</label>
                 <select class="form-control" id="id_grado_academico" name="id_grado_academico">
                    <option disabled selected>Seleccione una opción</option>
                    @foreach ($grados as $grado)
                    <option value="{{$grado->idgradoacademico}}">{{$grado->nombgradoacademico}}</option>
                    @endforeach
                </select> 
                @error('id_grado_academico')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                <label for="modalidad">Modalidad</label>
                <select class="form-control select2 select2-hidden-accessible" id="modalidad" name="modalidad" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('modalidad') }}">
                    <option disabled selected>Seleccione una opción</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                    <option value="Semi-presencial">Semi-presencial</option>
                </select>
                @error('modalidad')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 mb-3">
                <label for="institucion_superior">Universidad / Institucion Superior</label>
                <input type="text" name="institucion_superior" class="form-control" id="institucion_superior" value="{{ old('institucion_superior') }}" placeholder="Inserte la Institucion Superior">
                @error('institucion_superior')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 mb-3">
                    <label for="titulo">Titulo Obtenido / Por Obtener</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}" placeholder="Inserte Titulo academico">
                    @error('titulo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

{{--               <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                <label for="estatus_prepformal">Estatus</label>
                <select class="form-control select2 select2-hidden-accessible" id="estatus_prepformal" name="estatus_prepformal" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('estatus_prepformal') }}">
                    <option disabled selected>Seleccione una opción</option>
                    <option value="Cursando Actualmente">Cursando Actualmente</option>
                    <option value="Completo">Completo</option>
                </select>
                @error('estatus_prepformal')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> --}}

            <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                <label for="tipo">Lugar de Preparacion</label>
                <select class="form-control select2 select2-hidden-accessible" id="tipo" name="tipo" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('tipo') }}">
                    <option disabled selected>Seleccione una opción</option>
                    <option value="Nacional">Nacional</option>
                    <option value="Extranjero">Extranjero</option>
                </select>
                @error('tipo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-md-3 mb-3">
                <label for="pais">País</label>
                <input type="text" name="pais" class="form-control" id="pais" value="{{ old('pais') }}" placeholder="Inserte el País">
                @error('pais')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
                </div>

                <div class="row">
            {{--           <div class="col-lg-3 col-md-3 mb-3">
                        <label for="ano_titulo">Año</label>
                        <input type="text" name="ano_titulo" class="form-control" id="ano_titulo" value="{{ old('ano_titulo') }}" placeholder="Inserte el año">
                        @error('ano_titulo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div> --}}
    
                      <div class="col-md-3 mb-3">
                        <label for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}">
                        @error('fecha_inicio')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                          <label for="fecha_fin">Fecha Fin</label>
                          <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}">
                          @error('fecha_fin')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="financiamiento">Recursos</label>
                        <select class="form-control select2 select2-hidden-accessible" id="financiamiento" name="financiamiento" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('financiamiento') }}">
                            <option disabled selected>Seleccione una opción</option>
                            <option value="Recursos Propios">Recursos Propios</option>
                            <option value="Beca">Beca</option>
                            <option value="Financiamiento">Financiamiento</option>
                        </select>
                        @error('financiamiento')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="monto_asignado">Monto Asignado</label>
                        <input type="number" name="monto_asignado" class="form-control" id="monto_asignado" value="{{ old('monto_asignado') }}" placeholder="$">
                        @error('monto_asignado')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                            <ul class="text-danger">
                                <li>IMAGEN-ARCHIVOS DEMOSTRACION SERA OBLIGATORIA | REQUIRED </li>
                                <li>FEHCA INICIO | FECHA FIN</li>
                                <li>SE OMITIRA (CURSANDO ACTUALMENTE) y AÑO SI SE DESEA COLOCAR SE REINTEGRARA</li>
                            </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like look</small></h3>
                                </div>
                                <div class="card-body">
                                    <div id="actions" class="row">
                                        <div class="col-lg-6">
                                            <div class="btn-group w-100">
                                                <span class="btn btn-success col fileinput-button dz-clickable">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Add files</span>
                                                </span>
                                                <button type="submit" class="btn btn-primary col start">
                                                    <i class="fas fa-upload"></i>
                                                    <span>Start upload</span>
                                                </button>
                                                <button type="reset" class="btn btn-warning col cancel">
                                                    <i class="fas fa-times-circle"></i>
                                                    <span>Cancel upload</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center">
                                            <div class="fileupload-process w-100">
                                                <div id="total-progress" class="progress progress-striped active"
                                                    role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;"
                                                        data-dz-uploadprogress=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table table-striped files" id="previews">
        
                                    </div>
                                </div>
        
                                <div class="card-footer">
                                    Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and
                                    information about the plugin.
                                </div>
                            </div>
        
                        </div>
                    </div>

            <div class="row justify-content-center text-center mt-5">
                <div class="col-12">
                    <input type="submit" value="Guardar" class="btn btn-success">
                </div>
            </div>
        </form>
        
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // Espera 3 segundos y luego oculta el mensaje de éxito
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 3000); // 3 segundos
        </script>
@stop