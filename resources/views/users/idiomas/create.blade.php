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
            
            <div class="form-group col-md-4 mb-3" data-select2-id="29">
                <label for="idioma">Seleccione un Idioma</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('idioma') }}">
                <option selected="selected" data-select2-id="3">Alabama</option>
                <option data-select2-id="36">Alaska</option>
                <option data-select2-id="37">California</option>
                <option data-select2-id="38">Delaware</option>
                <option data-select2-id="39">Tennessee</option>
                <option data-select2-id="40">Texas</option>
                <option data-select2-id="41">Washington</option>
                </select>
                @error('idioma')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

              <div class="form-group col-md-4 mb-3" data-select2-id="29">
                <label for="lee_nivel">Nivel de Lectura</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('lee_nivel') }}">
   {{--                  @foreach($idiomas as $idioma)
                    <option value="{{$idioma->nivel}}">{{$idioma->nivel}}</option>
                    @endforeach --}}
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
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('escribe_nivel') }}">
                           {{--                  @foreach($idiomas as $idioma)
                    <option value="{{$idioma->nivel}}">{{$idioma->nivel}}</option>
                    @endforeach --}}
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
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('habla_nivel') }}">
                           {{--                  @foreach($idiomas as $idioma)
                    <option value="{{$idioma->nivel}}">{{$idioma->nivel}}</option>
                    @endforeach --}}
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
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ old('comprende_nivel') }}">
                           {{--                  @foreach($idiomas as $idioma)
                    <option value="{{$idioma->nivel}}">{{$idioma->nivel}}</option>
                    @endforeach --}}
                        <option value="Basico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                    @error('comprende_nivel')
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