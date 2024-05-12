@extends('adminlte::page')

@section('title', 'Empleos')

@section('content_header')
    <h1>Editar Empleo</h1>
@stop
{{-- <a class="btn btn-primary mr-3" href="{{route('users.empleos.index')}}">Volver</a> --}}

@section('content')
@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">
        <form method="POST" action="{{route('users.empleos.update', $experienciaLaboral) }}">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-4 mb-3">
              <label for="empresa">Empresa</label>
              <input type="text" name="empresa" class="form-control" id="empresa" value="{{ $experienciaLaboral->empresa }}">
              @error('empresa')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-lg-4 col-md-4 mb-3" data-select2-id="29">
                <label for="sector_empresa">Sector Empresa</label>
                <select class="form-control select2 select2-hidden-accessible" id="sector_empresa" name="sector_empresa" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" 
                value="{{ $experienciaLaboral->sector_empresa }}">
                    @foreach(['Tecnología', 'Salud', 'Educación', 'Finanzas', 'Manufactura', 'Comercio minorista', 'Agricultura', 'Construcción', 'Energía', 'Medios de comunicación', 'Servicios profesionales', 'Bienes raíces', 'Transporte', 'Hotelería y turismo', 'Entretenimiento', 'Consultoría', 'ONGs y organizaciones sin fines de lucro', 'Gobierno y sector público', 'Investigación y desarrollo (I+D)', 'Otros'] as $sectores)
                    <option value="{{ $sectores }}" {{ $experienciaLaboral->sector_empresa == $sectores ? 'selected' : '' }}>{{ $sectores }}</option>
                    @endforeach
                </select>
                @error('sector_empresa')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            

            <div class="col-md-4 mb-3">
              <label for="cargo">Cargo</label>
              <input type="text" name="cargo" class="form-control" id="cargo" value="{{ $experienciaLaboral->cargo }}">
              @error('cargo')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-3 col-md-3 mb-3" data-select2-id="29">
                    <label for="estatus_empleo">Estado</label>
                    <select class="form-control select2 select2-hidden-accessible" id="estatus_empleo" name="estatus_empleo" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                    value="{{ $experienciaLaboral->estatus_empleo }}">
                        @foreach(['Concluido', 'Actualmente laborando'] as $estatus)
                        <option value="{{ $estatus }}" {{ $experienciaLaboral->estatus_empleo == $estatus ? 'selected' : '' }}>{{ $estatus }}</option>
                        @endforeach
                    </select>
                    @error('estatus_empleo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3 col-md-3 mb-3">
                  <label for="pais">País</label>
                  <input type="text" name="pais" class="form-control" id="pais" value="{{ $experienciaLaboral->pais }}">
                  @error('pais')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-lg-3 col-md-3 mb-3">
                  <label for="fechainicio">Fecha Inicio</label>
                  <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" value="{{ $experienciaLaboral->fecha_inicio }}" name="fecha_inicio" id="fecha_inicio">
                  @error('fecha_inicio')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-lg-3 col-md-3 mb-3">
                    <label for="fechafinal">Fecha Final</label>
                    <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" value="{{ $experienciaLaboral->fecha_fin }}" name="fecha_fin" id="fecha_inicio">
                    @error('fecha_fin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                        {{-- <button type="submit" href="/devices" class="btn btn-primary">Volver</button> --}}

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