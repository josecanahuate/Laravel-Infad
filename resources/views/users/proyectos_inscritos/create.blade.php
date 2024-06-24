@extends('adminlte::page')

@section('title', 'Proyectos Inscritos')

@section('content_header')
    <h1>Proyectos Inscritos</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.proyectos_inscritos.index')}}">Volver</a> --}}
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
                <input type="text" name="titulo_investigacion" class="form-control" id="titulo_investigacion" value="{{ old('titulo_investigacion') }}" placeholder="Inserte el Título de la Investigación">
                @error('titulo_investigacion')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end row --}}

            <div class="row">
            <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                <label for="sector_pertenece">Sector Empresa</label>
                <select class="form-control select2 select2-hidden-accessible" id="sector_pertenece" name="sector_pertenece" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('sector_pertenece') }}">
                    <option value="" disabled selected>Seleccionar opción</option>
                    <option value="Tecnología">Tecnología</option>
                    <option value="Salud">Salud</option>
                    <option value="Educación">Educación</option>
                    <option value="Finanzas">Finanzas</option>
                    <option value="Manufactura">Manufactura</option>
                    <option value="Comercio minorista">Comercio minorista</option>
                    <option value="Agricultura">Agricultura</option>
                    <option value="Construcción">Construcción</option>
                    <option value="Energía">Energía</option>
                    <option value="Medios de comunicación">Medios de comunicación</option>
                    <option value="Servicios profesionales">Servicios profesionales</option>
                    <option value="Bienes raíces">Bienes raíces</option>
                    <option value="Transporte">Transporte</option>
                    <option value="Hotelería y turismo">Hotelería y turismo</option>
                    <option value="Entretenimiento">Entretenimiento</option>
                    <option value="Consultoría">Consultoría</option>
                    <option value="ONGs y organizaciones sin fines de lucro">ONGs y organizaciones sin fines de lucro</option>
                    <option value="Gobierno y sector público">Gobierno y sector público</option>
                    <option value="Investigación y desarrollo (I+D)">Investigación y desarrollo (I+D)</option>
                </select>
                @error('sector_pertenece')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

                <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                    <label for="id_area_investigacion">Área de Investigación</label>
                    <select class="form-control select2 select2-hidden-accessible area" id="id_area_investigacion" name="id_area_investigacion" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_area_investigacion') }}">
                        <option disabled selected>Seleccione una opción</option>
                        @foreach ($areas as $area)
                        <option value="{{$area->id_areainv}}">{{$area->nombreainvest}}</option>
                        @endforeach
                    </select>
                    @error('id_area_investigacion')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                    <label for="id_linea_investigacion">Línea de Investigación</label>
                    <select class="form-control select2 select2-hidden-accessible" id="id_linea_investigacion" name="id_linea_investigacion" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_linea_investigacion') }}">
                        <option disabled selected>Seleccione una opción</option>
                        @foreach ($lineas as $linea)
                        <option value="{{$linea->id_linea}}">{{$linea->nombre_linea}}</option>
                        @endforeach
                    </select>
                    @error('id_linea_investigacion')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div> {{-- end row --}}
      
                <div class="row">   
                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="id_programa_adscribe">Programa adscrito</label>
                    <select class="form-control select2 select2-hidden-accessible" id="id_programa_adscribe" name="id_programa_adscribe" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_programa_adscribe') }}">
                        <option disabled selected>Seleccione una opción</option>
                        @foreach ($programas as $programa)
                        <option value="{{$programa->idadscribe}}">{{$programa->nombadscribe}}</option>
                        @endforeach
                    </select>
                    @error('id_programa_adscribe')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="estado_actual">Estado</label>
                    <select class="form-control select2 select2-hidden-accessible" id="estado_actual" name="estado_actual" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('estado_actual') }}">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="En Progreso">En Progreso</option>
                        <option value="Completado">Completado</option>
                        <option value="Completado">Completado</option>
                        <option value="Aprobado">Aprobado</option>
                    </select>
                    @error('estado_actual')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                    <div class="col-md-3 mb-3">
                        <label for="periodo_vigencia_ini">Período de Inicio</label>
                        <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="periodo_vigencia_ini" id="periodo_vigencia_ini" value="{{ old('periodo_vigencia_ini') }}">
                        @error('periodo_vigencia_ini')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="periodo_vigencia_fin">Período de Vigencia</label>
                        <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="periodo_vigencia_fin" id="periodo_vigencia_fin" value="{{ old('periodo_vigencia_fin') }}">
                        @error('periodo_vigencia_fin')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div> {{-- end row --}}
                    


                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-3">
                      <label for="entidad_financiera">Entidad Financiadora</label>
                      <input type="text" name="entidad_financiera" class="form-control" id="entidad_financiera" value="{{ old('entidad_financiera') }}" placeholder="Inserte la Entidad Financiadora">
                      @error('entidad_financiera')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-lg-3 col-md-3 mb-3">
                      <label for="monto_asignado">Monto Asignado</label>
                      <input type="number" name="monto_asignado" class="form-control" id="monto_asignado" value="{{ old('monto_asignado') }}" placeholder="Inserte el Monto Asignado">
                      @error('monto_asignado')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="id_sede">Sede ejecutora</label>
                        <select class="form-control select2 select2-hidden-accessible" id="id_sede" name="id_sede" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_sede') }}">
                            <option disabled selected>Seleccione una opción</option>
                            @foreach ($sedes as $sede)
                            <option value="{{$sede->idsede}}">{{$sede->nombsede}}</option>
                            @endforeach
                        </select>
                        @error('id_sede')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                        <label for="id_facultad">Facultad ejecutora</label>
                        <select class="form-control select2 select2-hidden-accessible" id="id_facultad" name="id_facultad" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('id_facultad') }}">
                            <option disabled selected>Seleccione una opción</option>
                            @foreach ($facultades as $facultad)
                            <option value="{{$facultad->idfacultad}}">{{$facultad->nombfacultad}}</option>
                            @endforeach
                        </select>
                        @error('id_facultad')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div> {{-- end row --}}

                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-3">
                        <label for="sitio_web">Sitio Web del Proyecto</label>
                        <input type="text" name="sitio_web" class="form-control" id="sitio_web" value="{{ old('sitio_web') }}" placeholder="URL del Sitio Web del Proyecto">
                        @error('sitio_web')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div> {{-- end row --}}

                    <div class="row">
                      <div class="col-lg-12 col-md-12 mb-3">
                        <label for="enlace_video">Enlace a Video del Proyecto</label>
                        <input type="text" name="enlace_video" class="form-control" id="enlace_video" value="{{ old('enlace_video') }}" placeholder="Enlace a Video del Proyecto">
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
@stop

@section('js')
    <script>
        // Espera 3 segundos y luego oculta el mensaje de éxito
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 3000); // 3 segundos
        </script>

{{-- SCRIPT PARA TABLA AREA DE INVESTIGACION Y LINEA DE INVESTIGACION --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

{{-- funciona con la ruta get --}}
<script>
    $(document).ready(function() {
        //$('.select2.area').select2();

        $('#id_area_investigacion').change(function() {
            var areaId = $(this).val();
            $('#id_linea_investigacion').empty();
            $('#id_linea_investigacion').append('<option disabled selected>Seleccione una opción</option>');

            if (areaId) {
                $.ajax({
                    url: '/lineas-investigacion/' + areaId,
                    type: 'GET',
                    success: function(data) {
                        data.forEach(function(linea) {
                            $('#id_linea_investigacion').append('<option value="' + linea.id + '">' + linea.nombre_linea + '</option>');
                        });
                    },
                    error: function() {
                        $('#id_linea_investigacion').append('<option>No hay líneas de investigación disponibles</option>');
                    }
                });
            }
        });
    });
</script>


{{-- <script>
    $(document).ready(function() {
        // Definir un objeto que mapee cada área con sus líneas de investigación
        var areasLineasInvestigacion = {
            "Agroindustria": ["Innocuidad Alimentaria", "Prospección de Agroindustria", "Procesamiento y Análisis Alimentario", "Tecnología Agroindustrial", "Aprovechamiento de Residuos Agroindustriales", "Tecnología de los Alimentos"],
            "Biotecnología": ["Bioinformática", "Química Informática", "Ciencias Ómicas (Genómica, Proteómica, Metabolómica, Transcriptómica)", "Ingeniería de Alimentos", "Biología de Sistemas", "Ingeniería Genética y Biología Sintética", "Bioprocesos y Procesos Industriales", "Análisis de Datos y Aprendizaje Automático para Ciencias Biológicas"],
            // Agrega más áreas y sus líneas de investigación aquí
        };

        // Cuando cambia la selección del área de investigación
        $('#id_area_investigacion').change(function() {
            var areaSeleccionada = $(this).val();
            var lineasInvestigacion = areasLineasInvestigacion[areaSeleccionada];

            // Limpiar el select de líneas de investigación
            $('#id_linea_investigacion').empty();

            // Agregar las opciones correspondientes al select de líneas de investigación
            if (lineasInvestigacion) {
                lineasInvestigacion.forEach(function(linea) {
                    $('#id_linea_investigacion').append('<option value="' + linea + '">' + linea + '</option>');
                });
            } else {
                $('#id_linea_investigacion').append('<option value="">No hay líneas de investigación disponibles</option>');
            }
        });
    });
</script> --}}
@stop