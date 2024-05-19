@extends('adminlte::page')

@section('title', 'Tesis Asesoradas')

@section('content_header')
    <h1>Tesis Asesoradas</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.tesis_asesoradas.index')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.tesis_asesoradas.update', $tesis_asesorada) }}">
            @csrf
            @method('PUT')
        <div class="row">                        
                <div class="col-lg-12 col-md-12 mb-3">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" 
                    value="{{ $tesis_asesorada->titulo }}">
                    @error('titulo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                    <label for="id_area_investigacion">Area de Investigación</label>
                    <select class="form-control select2 select2-hidden-accessible" id="id_area_investigacion" name="id_area_investigacion" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_area_investigacion') }}">
                        @foreach ($areas as $area)
                        <option value="{{$area->id}}" {{ $tesis_asesorada->id_area_investigacion == $/* tipo_partipacion */->id ? 'selected' : '' }}>{{$area->nombreainvest}}</option>
                        @endforeach
                    </select>
                    @error('id_area_investigacion')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-4 mb-3">
                    <label for="fecha_sustentacion">Fecha de Sustentación</label>
                    <input type="date" class="form-control datetimepicker-input" 
                    value="{{ $tesis_asesorada->fecha_sustentacion }}" data-target-input="nearest" name="fecha_sustentacion" id="fecha_sustentacion">
                    @error('fecha_sustentacion')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  
                <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                    <label for="tipo_participaciones">Grado Académico</label>
                    <select class="form-control select2 select2-hidden-accessible" id="tipo_participaciones" name="tipo_participaciones" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('tipo_participaciones') }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="Presentador Principal">Presentador Principal</option>
                        <option value="Asistente">Asistente</option>
                        <option value="Coordinador">Coordinador</option>
                        <option value="Organizador">Organizador</option>
                        <option value="Evaluador">Evaluador</option>
                    </select>
                    @error('tipo_participaciones')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="tipo_participaciones">Unidad / Facultad</label>
                        <select class="form-control select2 select2-hidden-accessible" id="tipo_participaciones" name="tipo_participaciones" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('tipo_participaciones') }}">
                            <option disabled selected>Seleccione una opción</option>
     {{--                        @foreach ($unidades as $unidad)
                            <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                            @endforeach --}}
       {{--                      Facultad de Ing. Civil
                            Facultad de Ing. Eléctrica
                            Facultad de Ing. Industrial
                            Facultad de Ing. Mecánica
                            Facultad de Ing. de Sistemas Computacionales --}}
                        </select>
                        @error('tipo_participaciones')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="pais">País</label>
                        <input type="text" name="pais" class="form-control" id="pais" value="{{ $tesis_asesorada->pais }}">
                        @error('pais')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                  
                  <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="publicacion_revista">Publicación en Revista</label>
                    <select class="form-control select2 select2-hidden-accessible" id="publicacion_revista" name="publicacion_revista" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                    value="{{ $tesis_asesorada->publicacion_revista }}">
                    @foreach(['No', 'Si'] as $publicacion)
                    <option value="{{ $publicacion }}" {{ $tesis_asesorada->publicacion_revista == $publicacion ? 'selected' : '' }}>{{ $publicacion }}</option>
                    @endforeach
                    </select>
                    @error('publicacion_revista')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="financiacion_externa">Financiación Externa</label>
                    <select class="form-control select2 select2-hidden-accessible" id="financiacion_externa" name="financiacion_externa" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                    value="{{ $tesis_asesorada->financiacion_externa }}">
                    @foreach(['No', 'Si'] as $financiacion)
                    <option value="{{ $financiacion }}" {{ $tesis_asesorada->financiacion_externa == $financiacion ? 'selected' : '' }}>{{ $financiacion }}</option>
                    @endforeach
                    </select>
                    @error('financiacion_externa')
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
                    <input type="submit" value="Actualizar" class="btn btn-success">
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