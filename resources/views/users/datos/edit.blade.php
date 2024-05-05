@extends('adminlte::page')

@section('title', 'Editar Información Personal')

@section('content_header')
    <h1>Información Personal</h1>
@stop

@section('content')
@if (session ('success'))
    <div class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
    {!! Form::model($dato, ['route' => ['users.datos.update', $dato],  'method' => 'put']) !!}

    <div class="form-group">
            {!! Form::label('cedula', 'Cédula') !!}
            {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su cédula']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nombres', 'Nombres') !!}
            {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese sus nombres']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos') !!}
            {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Ingrese sus apellidos']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
            {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('genero', 'Género') !!}
            {!! Form::select('genero', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Otro' => 'Otro'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un género']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('estado_civil', 'Estado Civil') !!}
            {!! Form::select('estado_civil', ['Soltero(a)' => 'Soltero(a)', 'Casado(a)' => 'Casado(a)', 'Divorciado(a)' => 'Divorciado(a)', 'Viudo(a)' => 'Viudo(a)'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado civil']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nacionalidad', 'Nacionalidad') !!}
            {!! Form::text('nacionalidad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nacionalidad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dir_postal', 'Dirección Postal') !!}
            {!! Form::text('dir_postal', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su dirección postal']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('correo_institucional', 'Correo Institucional') !!}
            {!! Form::email('correo_institucional', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su correo institucional']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tel_oficina', 'Teléfono de Oficina') !!}
            {!! Form::text('tel_oficina', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono de oficina']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tel_residencia', 'Teléfono de Residencia') !!}
            {!! Form::text('tel_residencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono de residencia']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tel_celular', 'Teléfono Celular') !!}
            {!! Form::text('tel_celular', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono celular']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nivel_academico', 'Nivel Académico') !!}
            {!! Form::select('nivel_academico', ['Primaria' => 'Primaria', 'Secundaria' => 'Secundaria', 'Técnico' => 'Técnico', 'Universitario' => 'Universitario', 'Postgrado' => 'Postgrado', 'Maestría' => 'Maestría', 'Doctorado' => 'Doctorado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un nivel académico']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cargo', 'Cargo') !!}
            {!! Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su cargo']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('area_interes', 'Área de Interés') !!}
            {!! Form::select('area_interes', ['Tecnología' => 'Tecnología', 'Salud' => 'Salud', 'Educación' => 'Educación', 'Arte' => 'Arte', 'Ciencia' => 'Ciencia', 'Deporte' => 'Deporte'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un área de interés']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
</div>
</div>
@stop
