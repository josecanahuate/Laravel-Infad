@extends('adminlte::page')

@section('title', 'Idiomas')

@section('content_header')
    <h1>Idiomas</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.idiomas.inidiomasdex')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif

    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.idiomas.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
              <label for="institucion">Institución</label>
              <input type="text" name="institucion" class="form-control" id="institucion" value="{{ old('institucion') }}" placeholder="Inserte la Institución">
              @error('institucion')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
              <div class="form-group col-md-4 mb-3">
                <label for="idioma">Idioma</label>
                <select class="form-control" id="idioma" name="idioma" value="{{ old('idioma') }}">
                    <option value="Español">Español</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Chino">Chino</option>
                    <option value="Francés">Francés</option>
                    <option value="Alemán">Alemán</option>
                    <option value="Italiano">Italiano</option>
                    <option value="Portugués">Portugués</option>
                    <option value="Japonés">Japonés</option>
                    <option value="Coreano">Coreano</option>
                    <option value="Ruso">Ruso</option>
                    <option value="Árabe">Árabe</option>
                </select>
                @error('idioma')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
              <div class="form-group col-md-4 mb-3" data-select2-id="29">
                <label for="lee_nivel">Nivel de Lectura</label>
                <select class="form-control select2 select2-hidden-accessible" id="lee_nivel" name="lee_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('lee_nivel') }}">
                    <option value="Basico">Básico</option>
                    <option value="Intermedio">Intermedio</option>
                    <option value="Avanzado">Avanzado</option>
                </select>
                @error('lee_nivel')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="escribe_nivel">Nivel de Escritura</label>
                    <select class="form-control select2 select2-hidden-accessible" id="escribe_nivel" name="escribe_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('escribe_nivel') }}">
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('escribe_nivel')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="habla_nivel">Nivel Hablado</label>
                    <select class="form-control select2 select2-hidden-accessible" id="habla_nivel" name="habla_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('habla_nivel') }}">
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('habla_nivel')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="comprende_nivel">Nivel de Comprension</label>
                    <select class="form-control select2 select2-hidden-accessible" id="comprende_nivel" name="comprende_nivel"  style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('comprende_nivel') }}">
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('comprende_nivel')
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