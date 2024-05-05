@extends('adminlte::page')

@section('title', 'Empleos')

@section('content_header')
    <h1>Listar Empleos Anteriores</h1>
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
        <form method="POST" action="{{route('users.empleos.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
              <label for="empresa">Empresa</label>
              <input type="text" name="empresa" class="form-control" id="empresa" value="{{ old('empresa') }}" placeholder="Inserte la Empresa">
              @error('empresa')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="cargo">Cargo</label>
              <input type="text" name="cargo" class="form-control" id="cargo" value="{{ old('cargo') }}" placeholder="Inserte el Cargo">
              @error('cargo')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            </div>

            <div class="row">
                {{-- autocompletar pais para evitar errores de escritura --}}
                <div class="col-md-4 mb-3">
                  <label for="pais">País</label>
                  <input type="text" name="pais" class="form-control" id="pais" value="{{ old('pais') }}" placeholder="Ej: Panamá, Colombia, España...">
                  @error('pais')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-4 mb-3">
                  <label for="fechainicio">Fecha Inicio</label>
                  <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_inicio" id="fecha_inicio">
                  @error('fecha_inicio')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fechafinal">Fecha Final</label>
                    <input type="date" class="form-control datetimepicker-input" data-target-input="nearest" name="fecha_fin" id="fecha_inicio">
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