@extends('adminlte::page')

@section('title', 'Editar Proyectos Inscritos')

@section('content_header')
    <h1>Editar Proyectos Inscritos</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.proyectos_inscritos.index')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.proyectos_inscritos.store') }}">
        @csrf
        <div class="row">        
            
            <div class="col-lg-12 col-md-12 mb-3">
                <label for="titulo_investigacion">Título de la Investigación</label>
                <input type="text" name="titulo_investigacion" class="form-control" id="titulo_investigacion" 
                value="{{ $proyectos_inscritos->titulo_investigacion }}">
                @error('titulo_investigacion')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end row --}}

            <div class="row">
                 {{-- ENUM - SELECT --}}
              <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                <label for="sector_pertenece">Sector al que Pertenece</label>
                <select class="form-control select2 select2-hidden-accessible" id="sector_pertenece" name="sector_pertenece" 
                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                value="{{ $proyectos_inscritos->sector_pertenece }}">
                    <option disabled selected>Seleccione una opción</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                @error('sector_pertenece')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

                {{-- AREA DE INVESTIGACION - TRAER DE LA BD --}}
                <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                    <label for="sector_pertenece">Área de Investigación</label>
                    <select class="form-control select2 select2-hidden-accessible" id="sector_pertenece" name="sector_pertenece" style="width: 100%;" 
                    data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ $proyectos_inscritos->sector_pertenece }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    @error('sector_pertenece')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- LINEA DE INVESTIGACION - TRAER DE LA BD - AL SELECCIONAR AREA SE DEBE MOSTRAR UNICAMENTE LA LINEA QUE LE CORRESPONDE --}}
                <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                    <label for="sector_pertenece">Línea de Investigación</label>
                    <select class="form-control select2 select2-hidden-accessible" id="sector_pertenece" 
                    name="sector_pertenece" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                    value="{{ $proyectos_inscritos->sector_pertenece }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    @error('sector_pertenece')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div> {{-- end row --}}
      
                <div class="row">
                {{-- PROGRAMA ADSCRIBE - TRAER DE LA BD - RELACIONAR --}}    
                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="sector_pertenece">Programa adscrito</label>
                    <select class="form-control select2 select2-hidden-accessible" id="sector_pertenece" name="sector_pertenece" style="width: 100%;" data-select2-id="1" 
                    tabindex="-1" aria-hidden="true" value="{{ $proyectos_inscritos->sector_pertenece }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    @error('sector_pertenece')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="estado_actual">Estado</label>
                    <select class="form-control select2 select2-hidden-accessible" id="estado_actual" name="estado_actual" style="width: 100%;" data-select2-id="1" tabindex="-1" 
                    aria-hidden="true" value="{{ $proyectos_inscritos->estado_actual }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="">Publicado</option>
                        <option value="">Completo</option>
                        <option value="">etcc ver opciones para poner</option>
                    </select>
                    @error('estado_actual')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                    <div class="col-md-3 mb-3">
                        <label for="periodo_vigencia_ini">Período de Inicio</label>
                        <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="periodo_vigencia_ini" id="periodo_vigencia_ini" 
                        value="{{ $proyectos_inscritos->periodo_vigencia_ini }}">
                        @error('periodo_vigencia_ini')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
    
                      <div class="col-md-3 mb-3">
                          <label for="periodo_vigencia_fin">Período de Vigencia</label>
                          <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="periodo_vigencia_fin" id="periodo_vigencia_fin" 
                          value="{{ $proyectos_inscritos->periodo_vigencia_fin }}">
                          @error('periodo_vigencia_fin')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    </div> {{-- end row --}}
                    


                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="entidad_financiera">Entidad Financiadora</label>
                        <input type="text" name="entidad_financiera" class="form-control" id="entidad_financiera" 
                        value="{{ $proyectos_inscritos->entidad_financiera }}">
                        @error('entidad_financiera')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-lg-3 col-md-3 mb-3">
                        <label for="monto_asignado">Monto Asignado</label>
                        <input type="number" name="monto_asignado" class="form-control" id="monto_asignado" 
                        value="{{ $proyectos_inscritos->monto_asignado }}">
                        @error('monto_asignado')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                    {{-- SEDE EJECUTORA - TRAER DE LA BD - RELACIONAR --}}  
                    <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="modalidad">Sede ejecutora</label>
                        <select class="form-control select2 select2-hidden-accessible" id="modalidad" name="modalidad" 
                        value="{{ $proyectos_inscritos->modalidad }}" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option disabled selected>Seleccione una opción</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        @error('modalidad')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="modalidad">Unidad o Facultad ejecutora</label>
                        <select class="form-control select2 select2-hidden-accessible" id="modalidad" name="modalidad" style="width: 100%;" data-select2-id="1" 
                        tabindex="-1" aria-hidden="true" value="{{ $proyectos_inscritos->modalidad }}">
                            <option disabled selected>Seleccione una opción</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        @error('modalidad')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div> {{-- end row --}}

                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-3">
                        <label for="sitio_web">Sitio Web del Proyecto</label>
                        <input type="text" name="sitio_web" class="form-control" id="sitio_web" 
                        value="{{ $proyectos_inscritos->sitio_web }}">
                        @error('sitio_web')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div> {{-- end row --}}

                    <div class="row">
                      <div class="col-lg-12 col-md-12 mb-3">
                        <label for="enlace_video">Enlace a Video del Proyecto</label>
                        <input type="text" name="enlace_video" class="form-control" id="enlace_video" 
                        value="{{ $proyectos_inscritos->enlace_video }}">
                        @error('enlace_video')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                </div> {{-- end row --}}

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