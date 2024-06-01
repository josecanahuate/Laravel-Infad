@extends('adminlte::page')

@section('title', 'Otras Publicaciones')

@section('content_header')
    <h1>Otras Publicaciones</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.otras_publicaciones.index')}}">Volver</a> --}}

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.otras_publicaciones.store') }}">
        @csrf
        <div class="row">        
            <div class="col-lg-8 col-md-8 mb-3">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}" placeholder="Inserte el Título de la Publicación">
                @error('titulo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-md-4 mb-3">
                <label for="fecha">Fecha de Publicación</label>
                <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha" id="fecha" value="{{ old('fecha') }}">
                @error('fecha')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end row --}}

            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control datetimepicker-input" data-target-input="nearest" name="isbn" id="isbn" value="{{ old('isbn') }}">
                        @error('isbn')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
    
                      <div class="col-md-6 mb-3">
                          <label for="editorial">Editorial / Medio donde se publicó</label>
                          <input type="text" class="form-control datetimepicker-input" data-target-input="nearest" name="editorial" id="editorial" value="{{ old('editorial') }}">
                          @error('editorial')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    </div> {{-- end row --}}
    
                    <div class="row">
                      <div class="col-lg-6 col-md-6 mb-3">
                        <label for="entidad_financiera">Entidad Financiadora</label>
                        <input type="text" name="entidad_financiera" class="form-control" id="entidad_financiera" value="{{ old('entidad_financiera') }}" placeholder="Inserte la Entidad Financiadora">
                        @error('entidad_financiera')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                    {{-- TIPO DE PUBLICACION - TRAER DE LA BD - RELACIONAR --}}  
                    <div class="form-group col-lg-6 col-md-6 mb-3" data-select2-id="29">
                        <label for="publicacion">Tipo de Publicación</label>
                        <select class="form-control select2 select2-hidden-accessible" id="id_publicacion" name="id_publicacion" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_publicacion') }}">
                            <option disabled selected>Seleccione una opción</option>
                            @foreach ($publicaciones as $publicacion)
                            <option value="{{$publicacion->id}}">{{$publicacion->nombpublicacion}}</option>
                            @endforeach
                        </select>
                        @error('id_publicacion')
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