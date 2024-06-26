@extends('adminlte::page')

@section('title', 'Seminarios Dictados')

@section('content_header')
    <h1>Editar Seminarios Dictados</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.seminarios_dictados.index')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.seminarios_dictados.update', $seminarios_dictado) }}">
            @csrf
            @method('PUT')
        <div class="row">           
            <div class="col-lg-6 col-md-6 mb-3">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $seminarios_dictado->titulo }}">
                @error('titulo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-lg-6 col-md-6 mb-3">
                <label for="institucion">Institución</label>
                <input type="text" name="institucion" class="form-control" id="institucion" 
                value="{{ $seminarios_dictado->institucion }}">
                @error('institucion')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end row --}}

            <div class="row">
                <div class="col-lg-3 col-md-3 mb-3">
                    <label for="facilitador">Facilitador</label>
                    <input type="text" name="facilitador" class="form-control" id="facilitador" value="{{ $seminarios_dictado->facilitador }}">
                    @error('facilitador')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-md-3 mb-3">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_inicio" id="fecha_inicio" 
                    value="{{ $seminarios_dictado->fecha_inicio }}">
                    @error('fecha_inicio')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-md-3 mb-3">
                      <label for="fecha_fin">Fecha Final</label>
                      <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_fin" id="fecha_fin" 
                      value="{{ $seminarios_dictado->fecha_fin }}">
                      @error('fecha_fin')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="col-lg-3 col-md-3 mb-3">
                    <label for="pais">País</label>
                    <input type="text" name="pais" class="form-control" id="pais" value="{{ $seminarios_dictado->pais }}">
                    @error('pais')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div> {{-- end row --}}

                <div class="row">
                    <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="modalidad">Modalidad</label>
                        <select class="form-control select2 select2-hidden-accessible" id="modalidad" name="modalidad" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                        value="{{ $seminarios_dictado->modalidad }}">
                            @foreach(['Presencial', 'Virtual', 'Semi-presencial'] as $modalidadestudio)
                            <option value="{{ $modalidadestudio }}" {{ $seminarios_dictado->modalidad == $modalidadestudio ? 'selected' : '' }}>{{ $modalidadestudio }}</option>
                            @endforeach
                        </select>
                        @error('modalidad')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="lugar">Lugar del Seminario</label>
                        <input type="text" name="lugar" class="form-control" id="lugar" 
                        value="{{ $seminarios_dictado->lugar }}">
                        @error('lugar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-lg-3 col-md-3 mb-3">
                        <label for="horas">Horas</label>
                        <input type="text" name="horas" class="form-control" id="horas" 
                        value="{{ $seminarios_dictado->horas }}">
                        @error('horas')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                      <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="id_tipo_participacion">Tipo de Participación</label>
                        <select class="form-control select2 select2-hidden-accessible" id="id_tipo_participacion" name="id_tipo_participacion" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            @foreach ($participaciones as $participacion)
                            <option value="{{ $participacion->idparticipaciones }}" {{ $participacion->idparticipaciones == $seminarios_dictado->id_tipo_participacion ? 'selected' : '' }}>{{ $participacion->nombparticipaciones }}</option>
                            @endforeach
                        </select>
                        @error('id_tipo_participacion')
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