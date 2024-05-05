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
        <form method="POST" action="{{route('users.idiomas.update', $idioma) }}">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-4 mb-3">
              <label for="institucion">Institución</label>
              <input type="text" name="institucion" class="form-control" id="institucion" value="{{ $idioma->institucion }}">
              @error('institucion')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
              <div class="form-group col-md-4 mb-3">
                <label for="idioma">Idioma</label>
                <select class="form-control" id="idioma" name="idioma">
                    @foreach(['Español', 'Inglés', 'Chino', 'Francés', 'Alemán', 'Italiano', 'Portugués', 'Japonés', 'Coreano', 'Ruso', 'Árabe'] as $lang)
                        <option value="{{ $lang }}" {{ $idioma->idioma == $lang ? 'selected' : '' }}>{{ $lang }}</option>
                    @endforeach
                </select>
                
                @error('idioma')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
              <div class="form-group col-md-4 mb-3" data-select2-id="29">
                <label for="lee_nivel">Nivel de Lectura</label>
   {{--              <select class="form-control select2 select2-hidden-accessible" value="{{ $idioma->lee_nivel }}" id="lee_nivel" name="lee_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="Basico" {{ $idioma->lee_nivel == 'Basico' ? 'selected' : '' }}>Básico</option>
                    <option value="Intermedio" {{ $idioma->lee_nivel == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                    <option value="Avanzado" {{ $idioma->lee_nivel == 'Avanzado' ? 'selected' : '' }}>Avanzado</option>
                </select> --}}
                <select class="form-control select2 select2-hidden-accessible" id="lee_nivel" name="lee_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    @foreach(['Basico', 'Intermedio', 'Avanzado'] as $nivel)
                        <option value="{{ $nivel }}" {{ $idioma->lee_nivel == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                    @endforeach
                </select>  
                @error('lee_nivel')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="escribe_nivel">Nivel de Escritura</label>
                    <select class="form-control select2 select2-hidden-accessible" id="escribe_nivel" name="escribe_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach(['Basico', 'Intermedio', 'Avanzado'] as $nivel)
                            <option value="{{ $nivel }}" {{ $idioma->escribe_nivel == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                        @endforeach
                    </select>  
                    @error('escribe_nivel')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="habla_nivel">Nivel Hablado</label>
                    <select class="form-control select2 select2-hidden-accessible" id="habla_nivel" name="habla_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach(['Basico', 'Intermedio', 'Avanzado'] as $nivel)
                            <option value="{{ $nivel }}" {{ $idioma->habla_nivel == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                        @endforeach
                    </select>  
                    @error('habla_nivel')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3" data-select2-id="29">
                    <label for="comprende_nivel">Nivel de Comprension</label>
                    <select class="form-control select2 select2-hidden-accessible" id="comprende_nivel" name="comprende_nivel" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach(['Basico', 'Intermedio', 'Avanzado'] as $nivel)
                            <option value="{{ $nivel }}" {{ $idioma->comprende_nivel == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                        @endforeach
                    </select>                    
                    @error('comprende_nivel')
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