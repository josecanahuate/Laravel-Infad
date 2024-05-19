@extends('adminlte::page')

@section('title', 'Otras Publicaciones')

@section('content_header')
{{-- @can('users.preparacion_formal.create')
<a class="btn btn-primary float-right" href="{{route(users.otras_publicaciones.create')}}">Nuevo Empleo</a>
@endcan --}}
<a class="btn btn-primary float-right" href="{{route('users.otras_publicaciones.create')}}">Nuevo Registro</a>
    <h1>Otras Publicaciones</h1>
@stop

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered" id="publicaciones" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">TITULO</th>
                    <th class="text-center">FECHA</th>
                    <th class="text-center">ISBN</th>
                    <th class="text-center">EDITORIAL</th>
                    <th class="text-center">ESTATUS</th>
                    <th class="text-center">ACCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($publicaciones as $publicacion)
                    <tr>
                        <td class="text-center">{{$publicacion->id}}</td>
                        <td class="text-center">{{$publicacion->titulo}}</td>
                        <td class="text-center">{{$publicacion->fecha}}</td>
                        <td class="text-center">{{$publicacion->isbn}}</td>
                        <td class="text-center">{{$publicacion->editorial}}</td>
                        <td class="text-center"><span class="badge bg-warning">Pendiente</span></a></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                {{-- @can('users.preparacionformal.edit') --}}
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('users.otras_publicaciones.edit', $publicacion) }}">EDITAR</a>
                                {{-- @endcan --}}
                                {{-- @can('.preparacionformal.destroy') --}}
                                <form id="delete-form" action="{{ route('users.otras_publicaciones.destroy', $publicacion) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">BORRAR</button>
                                </form>
                               {{--  @endcan --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap4.css">
@stop

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
    {{-- responsive --}}
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            $('#publicaciones').DataTable( {
                responsive: true,
                autoWidth: true,
                language: {
                    "lengthMenu": "Mostrar " +
                        `<select class="custom-select custom-select-sm form-control form-control-sm"> 
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="-1">Todos</option>
                        </select>`+ " registros por página",
                    "zeroRecords": "Nada Encontrado - Disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": { 
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                }
            } );
        });
    </script>

    <script>
    // Espera 3 segundos y luego oculta el mensaje de éxito
    setTimeout(function() {
        $('#successMessage').fadeOut('fast');
    }, 3000); // 3 segundos
    </script>

<script>
    // Función para mostrar el modal de confirmación
    function confirmDelete() {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo"
        }).then((result) => {
            // Si el usuario confirma la eliminación, enviar el formulario
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit(); // Envía el formulario
            }
        });
    }
</script>
@stop




