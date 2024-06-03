@extends('adminlte::page')

@section('title', 'Parcicipación en Congresos')

@section('content_header')
    <h1>Parcicipación en Congresos</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.participacion_congreso.index')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.participacion_congreso.store') }}">
        @csrf

        <div class="row">                        
                <div class="col-lg-5 col-md-5 mb-3">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}" placeholder="Inserte el Título">
                    @error('titulo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                    <label for="id_tipo_participacion">Tipo de Participación</label>
                    <select class="form-control select2 select2-hidden-accessible" id="id_tipo_participacion" name="id_tipo_participacion" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_tipo_participacion') }}">
                        <option disabled selected>Seleccione una opción</option>
                        @foreach ($participaciones as $participacion)
                        <option value="{{$participacion->idparticipaciones}}">{{$participacion->nombparticipaciones}}</option>
                        @endforeach
                    </select>
                    @error('id_tipo_participacion')
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

                <div class="col-lg-5 col-md-5 mb-3">
                    <label for="lugar_congreso">Lugar del Congreso</label>
                    <input type="text" name="lugar_congreso" class="form-control" id="lugar_congreso" value="{{ old('lugar_congreso') }}" placeholder="Inserte el Lugar del Congreso">
                    @error('lugar_congreso')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-md-2 mb-3">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" class="form-control datetimepicker-input" value="{{ old('fecha_inicio') }}" data-target-input="nearest" name="fecha_inicio" id="fecha_inicio">
                    @error('fecha_inicio')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-md-2 mb-3">
                      <label for="fecha_fin">Fecha Final</label>
                      <input type="date" class="form-control datetimepicker-input" value="{{ old('fecha_fin') }}" data-target-input="nearest" name="fecha_fin" id="fecha_fin">
                      @error('fecha_fin')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="publicacion_proceeding">Proceeding</label>
                    <select class="form-control select2 select2-hidden-accessible" id="publicacion_proceeding" name="publicacion_proceeding" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('publicacion_proceeding') }}">
                        <option value="" disabled selected>Seleccionar opción</option>
                        <option value="Presentado y Aceptado">Presentado y Aceptado</option>
                        <option value="Presentado pero no Aceptado">Presentado pero no Aceptado</option>
                        <option value="No Presentado">No Presentado</option>
                        <option value="Provisional">Provisional</option>
                    </select>
                    @error('publicacion_proceeding')
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