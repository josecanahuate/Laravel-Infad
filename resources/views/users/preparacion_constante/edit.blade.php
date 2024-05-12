@extends('adminlte::page')

@section('title', 'Preparacion Constante')

@section('content_header')
    <h1>Editar Preparacion Constante</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.preparacion_constante.index')}}">Volver</a> --}}

@section('content')

    @if (session('success'))
        <div id="successMessage" class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.preparacion_constante.update', $preparacion_constante) }}">
            @csrf
            @method('PUT')
            <div class="row">
                {{-- COLOCAR DE FORMA DINAMICA - TRAER DE TABLA DINAMICA --}}
                <div class="form-group col-lg-3 col-md-3 mb-3">
                    <label for="enfasis">Enfasis Actualización</label>
                    <select class="form-control" id="id_enfasis_actualizacion" name="id_enfasis_actualizacion"
                        value="{{ $preparacion_constante->id_enfasis_actualizacion }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="Diplomado">Diplomado</option>
                        <option value="Curso">Curso</option>
                        <option value="Pasantía">Pasantía</option>
                        <option value="Seminarios">Seminarios</option>
                        <option value="Talleres">Talleres</option>
                    </select>
                    @error('id_enfasis_actualizacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6 col-md-6 mb-3">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $preparacion_constante->titulo }}">
                    @error('titulo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="modalidad">Modalidad</label>
                    <select class="form-control select2 select2-hidden-accessible" id="modalidad" name="modalidad" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ $preparacion_constante->modalidad }}">
                        @foreach(['Presencial', 'Virtual', 'Semi-presencial'] as $modalidadestudio)
                        <option value="{{ $modalidadestudio }}" {{ $preparacion_constante->modalidad == $modalidadestudio ? 'selected' : '' }}>{{ $modalidadestudio }}</option>
                        @endforeach
                    </select>
                    @error('modalidad')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> {{-- end row --}}


            <div class="row">
                <div class="col-lg-6 col-md-6 mb-3">
                    <label for="centro_estudio">Centro de Estudio</label>
                    <input type="text" name="centro_estudio" class="form-control" id="centro_estudio"
                    value="{{ $preparacion_constante->centro_estudio }}">
                    @error('centro_estudio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3 col-md-3 mb-3">
                    <label for="pais">País</label>
                    <input type="text" name="pais" class="form-control" id="pais"
                    value="{{ $preparacion_constante->pais }}">
                    @error('pais')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3 col-md-3 mb-3">
                    <label for="duracion">Duración</label>
                    <input type="text" name="duracion" class="form-control" id="duracion"
                    value="{{ $preparacion_constante->duracion }}">
                    @error('duracion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 mb-3" data-select2-id="29">
                    <label for="estatus_prepconstante">Estatus</label>
                    <select class="form-control select2 select2-hidden-accessible" id="estatus_prepconstante" name="estatus_prepconstante" style="width: 100%;" data-select2-id="1" tabindex="-1" 
                    aria-hidden="true" value="{{ $preparacion_constante->estatus_prepconstante }}">
                        @foreach(['Cursando Actualmente', 'Completo'] as $estatusprep)
                        <option value="{{ $estatusprep }}" {{ $preparacion_constante->estatus_prepconstante == $estatusprep ? 'selected' : '' }}>{{ $estatusprep }}</option>
                        @endforeach
                    </select>
                    @error('estatus_prepconstante')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-lg-6 col-md-6 mb-3">
                    <label for="ano_titulo">Año Fin</label>
                    <input type="text" name="ano_titulo" class="form-control" id="ano_titulo"
                    value="{{ $preparacion_constante->ano_titulo }}">
                    @error('ano_titulo')
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

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                    <label>Textarea Disabled</label>
                    <textarea class="form-control" rows="3" placeholder="En este campo apareceran los comentarios del admin con instrucciones de porque le rechazaron el formualrio al usuario o mensaje 'aprobado' " disabled="" style="resize: none;"></textarea>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-center mt-5">
                <div class="col-12">
                    <input type="submit" value="Actualizar" class="btn btn-success">
                </div>
            </div>
        </form>

    </div>{{-- end container --}}


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
