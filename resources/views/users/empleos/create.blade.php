@extends('adminlte::page')

@section('title', 'Empleos')

@section('content_header')
<h1>Historia Laboral</h1>  
@stop

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    {{-- <p>Welcome to this beautiful admin panel.</p> --}}
    <p><a href="{{route('users.empleos.index') }}">Volver</a></p>
    <div class="container mt-2">
        <form method="POST" action="{{route('users.empleos.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
              <label for="empresa">Empresa / Institución</label>
              <input type="text" name="empresa" class="form-control" id="empresa" value="{{ old('empresa') }}" placeholder="Inserte la Empresa">
              @error('empresa')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                <label for="sector_empresa">Sector</label>
                <select class="form-control select2 select2-hidden-accessible" id="sector_empresa" name="sector_empresa" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('sector_empresa') }}">
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
                @error('sector_empresa')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="col-md-4 mb-3">
              <label for="cargo">Cargo</label>
              <input type="text" name="cargo" class="form-control" id="cargo" value="{{ old('cargo') }}" placeholder="Inserte el Cargo">
              @error('cargo')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="estatus_empleo">Estado</label>
                    <select class="form-control select2 select2-hidden-accessible" id="estatus_empleo" name="estatus_empleo" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('estatus_empleo') }}">
                        <option value="" disabled selected>Seleccionar opción</option>
                        <option value="Concluido">Concluido</option>
                        <option value="Actualmente laborando">Actualmente laborando</option>
                    </select>
                    @error('estatus_empleo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                  <label for="pais">País</label>
                  <input type="text" name="pais" class="form-control" id="pais" value="{{ old('pais') }}" placeholder="Ej: Panamá, Colombia, España...">
                  @error('pais')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-3 mb-3">
                  <label for="fechainicio">Fecha Ingreso</label>
                  <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_inicio" id="fecha_inicio" value="{{ old('fechainicio') }}">
                  @error('fecha_inicio')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fechafinal">Fecha Salida</label>
                    <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}">
                    @error('fecha_fin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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