@extends('adminlte::page')

@section('title', 'Preparacion Constante')

@section('content_header')
    <h1>Preparacion Constante</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.preparacion_constante.inidiomasdex')}}">Volver</a> --}}

@section('content')

    @if (session('success'))
        <div id="successMessage" class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{ route('users.preparacion_constante.store') }}">
            @csrf
            <div class="row">
                {{-- COLOCAR DE FORMA DINAMICA - TRAER DE TABLA DINAMICA --}}
                <div class="form-group col-lg-3 col-md-3 mb-3">
                    <label for="enfasis">Enfasis Actualización</label>
                    <select class="form-control" id="id_enfasis_actualizacion" name="id_enfasis_actualizacion"
                        value="{{ old('id_enfasis_actualizacion') }}">
                        <option disabled selected>Seleccione una opción</option>
                        @foreach ($enfasis as $enfasi)
                        <option value="{{$enfasi->idenfasis}}">{{$enfasi->nombrenfasis}}</option>
                        @endforeach
                    </select>
                    @error('id_enfasis_actualizacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            
                <div class="col-lg-6 col-md-6 mb-3">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}"
                        placeholder="Inserte el Titulo">
                    @error('titulo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="modalidad">Modalidad</label>
                    <select class="form-control select2 select2-hidden-accessible" id="modalidad" name="modalidad"
                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                        value="{{ old('modalidad') }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                        <option value="Semi-presencial">Semi-presencial</option>
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
                        value="{{ old('centro_estudio') }}" placeholder="Inserte el Centro de Estudio">
                    @error('centro_estudio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3 col-md-3 mb-3">
                    <label for="pais">País</label>
                    <input type="text" name="pais" class="form-control" id="pais" value="{{ old('pais') }}"
                        placeholder="Inserte el País">
                    @error('pais')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3 col-md-3 mb-3">
                    <label for="duracion">Duración</label>
                    <input type="number" name="duracion" class="form-control" id="duracion" value="{{ old('duracion') }}"
                        placeholder="Inserte las Horas">
                    @error('duracion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 mb-3" data-select2-id="29">
                    <label for="estatus_prepconstante">Estatus</label>
                    <select class="form-control select2 select2-hidden-accessible" id="estatus_prepconstante"
                        name="estatus_prepconstante" style="width: 100%;" data-select2-id="1" tabindex="-1"
                        aria-hidden="true" value="{{ old('estatus_prepconstante') }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="Cursando Actualmente">Cursando Actualmente</option>
                        <option value="Completo">Completo</option>
                    </select>
                    @error('estatus_prepconstante')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6 col-md-6 mb-3">
                    <label for="ano_titulo">Año Fin</label>
                    <input type="text" name="ano_titulo" class="form-control" id="ano_titulo"
                        value="{{ old('ano_titulo') }}" placeholder="Inserte año fin">
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

            <div class="row justify-content-center text-center mt-5">
                <div class="col-12">
                    <input type="submit" value="Guardar" class="btn btn-success">
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
