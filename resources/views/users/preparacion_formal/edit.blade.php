@extends('adminlte::page')

@section('title', 'Preparacion Formal')

@section('content_header')
    <h1>Editar Preparacion Formal</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.preparacion_formal.index')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
            <form method="POST" action="{{route('users.preparacion_formal.update', $preparacion_formal) }}">
            @csrf
            @method('PUT')
        <div class="row">            
                {{-- COLOCAR DE FORMA DINAMICA - TRAER DE TABLA DINAMICA --}}
              <div class="form-group col-lg-3 col-md-3 mb-3">
                <label for="idioma">Grado Académico</label>
                <select class="form-control" id="idioma" name="idioma">
                    <option disabled selected>Seleccione una opción</option>
                    <option value="Tecnico">Técnico</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Especializacion">Especialización</option>
                    <option value="Maestria">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                    <option value="Post Doctorado">Post Doctorado</option>
                </select>
                @error('idioma')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                <label for="modalidad">Modalidad</label>
                <select class="form-control select2 select2-hidden-accessible" id="modalidad" name="modalidad" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                value="{{ $preparacion_formal->modalidad }}">
                    @foreach(['Presencial', 'Virtual', 'Semi-presencial'] as $modalidadestudio)
                    <option value="{{ $modalidadestudio }}" {{ $preparacion_formal->modalidad == $modalidadestudio ? 'selected' : '' }}>{{ $modalidadestudio }}</option>
                    @endforeach
                </select>
                @error('modalidad')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 mb-3">
                <label for="institucion_superior">Universidad / Institucion Superior</label>
                <input type="text" name="institucion_superior" class="form-control" id="institucion_superior" value="{{ $preparacion_formal->institucion_superior }}">
                @error('institucion_superior')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-8 mb-3">
                    <label for="titulo">Titulo Obtenido / Por Obtener</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $preparacion_formal->titulo }}">
                    @error('titulo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

              <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                <label for="estatus_prepformal">Estatus</label>
                <select class="form-control select2 select2-hidden-accessible" id="estatus_prepformal" name="estatus_prepformal" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                value="{{ $preparacion_formal->estatus_prepformal }}">
                    @foreach(['Cursando Actualmente', 'Completo'] as $estatusprep)
                    <option value="{{ $estatusprep }}" {{ $preparacion_formal->estatus_prepformal == $estatusprep ? 'selected' : '' }}>{{ $estatusprep }}</option>
                    @endforeach
                </select>
                @error('estatus_prepformal')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="tipo">Tipo</label>
                        <select class="form-control select2 select2-hidden-accessible" id="tipo" name="tipo" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                        value="{{ $preparacion_formal->tipo }}">
                            @foreach(['Nacional', 'Extranjero'] as $extranjeria)
                            <option value="{{ $extranjeria }}" {{ $preparacion_formal->tipo == $extranjeria ? 'selected' : '' }}>{{ $extranjeria }}</option>
                            @endforeach
                        </select>
                        @error('tipo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="pais">País</label>
                        <input type="text" name="pais" class="form-control" id="pais" value="{{ $preparacion_formal->pais }}">
                        @error('pais')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-lg-3 col-md-3 mb-3">
                        <label for="ano_titulo">Año</label>
                        <input type="text" name="ano_titulo" class="form-control" id="ano_titulo" value="{{ $preparacion_formal->ano_titulo }}">
                        @error('ano_titulo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                        {{-- DECLARAR CAMPO COMO ENUM --}}
                      <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="financiamiento">Recursos</label>
                        <select class="form-control select2 select2-hidden-accessible" id="financiamiento" name="financiamiento" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                        value="{{ $preparacion_formal->financiamiento }}">
                            @foreach(['Recursos Propios', 'Beca', 'Financiamiento'] as $recursos)
                            <option value="{{ $recursos }}" {{ $preparacion_formal->financiamiento == $recursos ? 'selected' : '' }}>{{ $recursos }}</option>
                            @endforeach
                        </select>
                        @error('financiamiento')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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