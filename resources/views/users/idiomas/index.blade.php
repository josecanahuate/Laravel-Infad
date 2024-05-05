@extends('adminlte::page')

@section('title', 'Experiencia idiomaal')

@section('content_header')
{{-- @can('users.idiomas.create')
<a class="btn btn-primary float-right" href="{{route('admin.tags.create')}}">Nuevo Empleo</a>
@endcan --}}
<a class="btn btn-primary float-right" href="{{route('users.idiomas.create')}}">Nuevo Idioma</a>
    <h1>Lista de idiomas</h1>
@stop

@section('content')

@if (session ('success'))
    <div id="successMessage" class="alert alert-success">
        <strong>{{ session ('success') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered" id="idiomas" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">INSTITUCION</th>
                    <th class="text-center">IDIOMA</th>
                    <th class="text-center">LEE</th>
                    <th class="text-center">ESCRIBE</th>
                    <th class="text-center">HABLA</th>
                    <th class="text-center">COMPRENDE</th>
                    <th class="text-center">ACCIONES</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($idiomas as $idioma)
                    <tr>
                        <td class="text-center">{{$idioma->id}}</td>
                        <td class="text-center">{{$idioma->institucion}}</td>
                        <td class="text-center">{{$idioma->idioma}}</td>
                        <td class="text-center">{{$idioma->lee_nivel}}</td>
                        <td class="text-center">{{$idioma->escribe_nivel}}</td>
                        <td class="text-center">{{$idioma->habla_nivel}}</td>
                        <td class="text-center">{{$idioma->comprende_nivel}}</td>
                        <td class="text-center"><span class="badge bg-warning">Pendiente</span></a></td>
                        {{--<td>
                            <span class="badge bg-warning">Pendiente</span></a>
                             @if ($idioma->active)
                            <a href="{{route('devices.switch', $device->id) }}">
                            <span class="badge bg-success">Activo</span></a>
                            @elseif ()
                            <a href="{{route('devices.switch', $device->id) }}">
                            <span class="badge bg-danger">Inactivo</span></a>
                            @else
                            <a href="{{route('devices.switch', $device->id) }}">
                            <span class="badge bg-danger">Inactivo</span></a>
                            @endif --}}
                          </td>
                        <td> <!-- Nueva celda para acciones -->
                            <div class="d-flex justify-content-center">
                                {{-- @can('users.idiomas.edit') --}}
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('users.idiomas.edit', $idioma)}}">EDITAR</a>
                                {{-- @endcan --}}
                                {{-- @can('.idiomas.destroy') --}}
                                <form id="delete-form" action="{{ route('users.idiomas.destroy', $idioma) }}" method="POST">
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
            $('#idiomas').DataTable( {
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




